<?php

namespace App\Http\Controllers;

use App\CarMake;
use App\CarModel;
use App\City;
use App\Component;
use App\Http\Requests;
use App\Http\Requests\ParseExcelRequest;
use App\Rate;
use App\RepairShop;
use App\State;
use App\SubComponent;
use App\Zone;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the upload form
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        return view('upload');
    }

    /**
     *Handle get request to '/rate'
     *
     * @return \Illuminate\Http\Response
     */
    public function rate()
    {
        $components = Component::all('component_id', 'component');
        $repairshops = RepairShop::all('repairshop_id', 'repairshop');
        return view('rate', compact('components', 'repairshops'));
    }

    /**
     *Handle get request to '/analysis'
     *
     * @return \Illuminate\Http\Response
     */
    public function analysis()
    {
        $components = Component::all('component', 'component_id');
        $states = State::all('state', 'state_id');
        return view('analysis', compact('states', 'components'));
    }


    /**
     *Handle get request to '/profile'
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('profile');
    }

    /**
     *Handle post request to '/rate'
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postrate(Request $request)
    {
        $this->validate($request, [
            'component' => 'required',
            'subcomponents' => 'required',
        ]);
        $subcomponent = SubComponent::findOrFail($request->input('subcomponents'))->subcomponent;
        $rates = $this->handleRateRequest($request->all());
        return view('postrate', compact('rates', 'subcomponent'));
    }

    /**
     *Handle post request to '/analysis'
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function postanalysis(Request $request)
    {
        $this->validate($request, [
            'component' => 'required',
            'subcomponents' => 'required',
            'state' => 'required',
        ]);
        $report = $this->analyze($request->all());
        return view('postanalysis', compact('report'));
    }

    /**
     * Handle upload of excel/csv files
     *
     * @param ParseExcelRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function postupload(ParseExcelRequest $request)
    {
        if ($request->hasFile('excel')) {
            if ($request->file('excel')->isValid()) {
                $file = $request->file('excel');
                $result = $this->load($file);
                if($result['empty']) {
                    flash()->error('Try again please');
                    return redirect()->back();
                }
                else {
                    $msg = $result['count']. ': records inserted/updated!';
                    flash()->success($msg);
                    return redirect()->back();
                }
            }
            else {
                flash()->error('Try again please');
                return redirect()->back();
            }
        }
        else {
            flash()->error('Try again please');
            return redirect()->back();
        }
    }

    /**
     * Handle change of password
     *
     * @param ParseExcelRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function postprofile(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        $user = auth()->user();
        $user->password = bcrypt($request->input('password'));
        $user->save();
        flash()->success('Successfully Changed Password');
        return redirect()->back();
    }

    /**
     *Handle post ajax request
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxquery(Request $request)
    {
        if($request->ajax()) {
            $name = Input::get('name');
            if(strcasecmp($name, "state") == 0) {
                $stateid = Input::get('select');
                $state = State::findOrFail($stateid);
                $cities = $this->return_city($state);
                return Response::json(["result" => array("name" => "cities", "value" => $cities)]);
            }
            if(strcasecmp($name, "cities") == 0) {
                $cityid = Input::get('select');
                $city = City::findOrFail($cityid);
                $zones = $this->return_zone($city);
                return Response::json(["result" => array("name" => "zones", "value" => $zones)]);
            }
            if(strcasecmp($name, "component") == 0) {
                $componentid = Input::get('select');
                $component = Component::findOrFail($componentid);
                $subcomponents = $this->return_sub($component);
                return Response::json(["result" => array("name" => "subcomponents", "value" => $subcomponents)]);
            }
        }
    }

    /**
     *Handle post ajax request to /chartdata
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function chartdata(Request $request)
    {
        if($request->ajax()) {
            $zonecounter = array();
            $citycounter = array();
            $statecounter = array();
            $zones = Zone::all();
            foreach($zones as $zone){
                $count = $zone->repairshop()->count();
                $city = $zone->city;
                $state = $city->state;
                $zonecounter[$zone->zone] = $count;
                if(isset($citycounter[$city->city])) {
                    $citycounter[$city->city] += $count;
                }
                else {
                    $citycounter[$city->city] = $count;
                }
                if(isset($statecounter[$state->state])) {
                    $statecounter[$state->state] += $count;
                }
                else {
                    $statecounter[$state->state] = $count;
                }
            }
            return Response::json(["output" => array("state" => $statecounter, "city" => $citycounter, "zone" => $zonecounter)]);
        }
    }

    /*
     * Handle uploads to database using Excel
     * @param $file
     * @return mixed
     */
    private function load($file)
    {
        $empty = true;
        $count = 0;
        Excel::selectSheets('rates')->load($file, function($reader) use (&$empty, &$count) {
                $parse = $reader->select(array('repairshop', 'component', 'subcomponent', 'rate', 'carmake', 'carmodel'))->get();
                if(!$parse->isEmpty()) {
                    foreach($parse as $row) {
                        if(!$row->isEmpty()) {
                            $empty = false;
                            $rowvals = $row->all();
                            $repairshop = $this->makeRepairshop($rowvals['repairshop']);
                            $component = $this->makeComponent($rowvals['component']);
                            $subcomponent = $this->makeSubcomponent($rowvals['subcomponent'], $component);
                            $carmake = $this->makeCarmake($rowvals['carmake']);
                            $carmodel = $this->makeCarmodel($rowvals['carmodel'], $carmake);
                            $rate = $this->makeRate($carmodel, $subcomponent, $repairshop, $rowvals['rate']);
                            if($rate) {
                                $count++;
                            }
                        }
                    }
                }
        });
        return array('empty' => $empty, 'count' => $count);
    }

    /**
     * @param State $state
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function return_city(State $state)
    {
        return $state->city()
                      ->orderBy('city', 'asc')
                      ->get()
                      ->toArray();
    }

    /**
     * @param City $city
     * @return mixed
     */
    private function return_zone(City $city)
    {
        return $city->zone()
                    ->orderBy('zone', 'asc')
                    ->get()
                    ->toArray();
    }

    /**
     * @param $component
     * @return mixed
     */
    private function return_sub($component)
    {
        return $component->component()
                         ->orderBy('subcomponent', 'asc')
                         ->get()
                         ->toArray();
    }

    /**
     * @param $all
     */
    private function handleRateRequest($all)
    {
        if(!empty($all['repairshop'])) {
            $whereParams = ['subcomponent_id'=>$all['subcomponents'], 'repairshop_id'=> $all['repairshop']];
            return Rate::where($whereParams)
                        ->orderBy('carmodel_id', 'asc')
                        ->get();
        }
        return Rate::where('subcomponent_id', $all['subcomponents'])
                        ->orderBy('carmodel_id', 'asc')
                        ->get();
    }

    /**
     * @param $all
     * @return array
     */
    private function analyze($all)
    {
        if(!empty($all['zones'])) {
            return $this->handleZoneAnalytics($all);
        }
        if(!empty($all['cities'])) {
            return $this->handleCityAnalytics($all);
        }
        if(!empty($all['state'])) {
            return $this->handleStateAnalytics($all);
        }
    }

    /**
     * @param $all
     * @return array
     */
    private function handleZoneAnalytics($all)
    {
        $subcomponent = $all['subcomponents'];
        $zone = Zone::findOrFail($all['zones']);
        $repairshops = $zone->repairshop;
        return $this->returnAnalysis($repairshops, $subcomponent, 'zone', $zone);
    }

    /**
     * @param $all
     * @return array
     */
    private function handleCityAnalytics($all)
    {
        $subcomponent = $all['subcomponents'];
        $city = City::findOrFail($all['cities']);
        $zones = $city->zone;
        $repairshops = collect();
        foreach($zones as $zone) {
            $shops = $zone->repairshop;
            $repairshops = $repairshops->merge($shops);
        }
        return $this->returnAnalysis($repairshops, $subcomponent, 'city', $city);
    }

    /**
     * @param $all
     * @return array
     */
    private function handleStateAnalytics($all)
    {
        $subcomponent = $all['subcomponents'];
        $state = State::findOrFail($all['state']);
        $zones = $state->zone;
        $repairshops = collect();
        foreach($zones as $zone) {
            $shops = $zone->repairshop;
            $repairshops = $repairshops->merge($shops);
        }
        return $this->returnAnalysis($repairshops, $subcomponent, 'state', $state);
    }

    /**
     * @param $repairshops
     * @param $subcomponent
     * @param $region
     * @param $regionModel
     * @return array
     */
    private function returnAnalysis($repairshops, $subcomponent, $region, $regionModel)
    {
        $results = false;
        $sub = SubComponent::findOrFail($subcomponent);
        if(!$repairshops->isEmpty()) {
            $rates = array();
            foreach($repairshops as $repairshop) {
                $whereParams = ['subcomponent_id'=>$subcomponent, 'repairshop_id'=> $repairshop->repairshop_id];
                $query = Rate::where($whereParams)
                    ->orderBy('carmodel_id', 'asc')
                    ->get();
                if(!$query->isEmpty()) {
                    foreach($query as $rate) {
                        $rates[] = $rate;
                    }
                }
            }
            if(empty($rates)) {
                return ['results' => $results, 'subcomponent'=>$sub, 'region'=>$region, 'regionModel' =>$regionModel];
            }
            $minmax = $this->findMinMax($rates);
            $results = true;
            return array('results' => $results, 'analytics' => $minmax, 'rates' => $rates, 'subcomponent'=>$sub, 'region'=>$region, 'regionModel' =>$regionModel);
        }
        else {
            return ['results' => $results, 'subcomponent'=>$sub, 'region'=>$region, 'regionModel' =>$regionModel];
        }
    }

    /**
     * @param $rates
     * @return array
     */
    private function findMinMax($rates)
    {
        $min = $rates[0];
        $max = $rates[0];
        $amount = 0;
        $count = 0;
        foreach($rates as $rate) {
            if ($rate->amount <= $min->amount) {
                $min = $rate;
            }
            if ($rate->amount >= $max->amount) {
                $max = $rate;
            }
            $amount += $rate->amount;
            $count++;
        }
        $avg = round(($amount/$count), 2);
        return array('min' => $min, 'max' => $max, 'avg' => $avg);
    }

    /**
     * @param $name
     * @return static
     */
    private function makeRepairshop($name)
    {
        $repairshop = RepairShop::firstOrNew(['repairshop' => $name]);
        $repairshop->save();
        return $repairshop;
    }

    /**
     * @param $name
     * @return static
     */
    private function makeComponent($name)
    {
        $component = Component::firstOrNew(['component' => $name]);
        $component->save();
        return $component;
    }

    /**
     * @param $name
     * @param $component
     * @return static
     */
    private function makeSubcomponent($name, $component)
    {
        $subcomponent = SubComponent::firstOrNew(['subcomponent' => $name]);
        $subcomponent->component()->associate($component);
        $subcomponent->save();
        return $subcomponent;
    }

    /**
     * @param $name
     * @return static
     */
    private function makeCarmake($name)
    {
        $carmake = CarMake::firstOrNew(['carmake' => $name]);
        $carmake->save();
        return $carmake;
    }

    /**
     * @param $name
     * @param $carmake
     * @return static
     */
    private function makeCarmodel($name, $carmake)
    {
        $carmodel = CarModel::firstOrNew(['carmodel' => $name]);
        $carmodel->carmake()->associate($carmake);
        $carmodel->save();
        return $carmodel;
    }

    private function makeRate($carmodel, $subcomponent, $repairshop, $amount)
    {
        $rate = Rate::firstOrNew([
                        'carmodel_id' => $carmodel->carmodel_id,
                        'subcomponent_id' => $subcomponent->subcomponent_id,
                        'repairshop_id' => $repairshop->repairshop_id,
                        ]);
        $rate->amount = $amount;
        $rate->carmodel()->associate($carmodel);
        $rate->subcomponent()->associate($subcomponent);
        $rate->repairshop()->associate($repairshop);
        $rate->save();
        return $rate;
    }

}

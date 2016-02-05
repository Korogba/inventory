<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ParseExcelRequest;
use App\RepairDetail;
use App\State;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
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
     *Handle get request to '/price'
     *
     * @return \Illuminate\Http\Response
     */
    public function price()
    {
        $state = State::lists('name', 'id');
        return view('price', compact('state'));
    }

    /**
     *Handle get request to '/analysis'
     *
     * @return \Illuminate\Http\Response
     */
    public function analysis()
    {
        $service = RepairDetail::lists('name', 'id');
        return view('analysis', compact('service'));
    }

    /**
     *Handle post request to '/price'
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function getprice(Request $request)
    {
        dd($request->input('state'));
    }

    /**
     *Handle post ajax request to 'get '
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxquery(Request $request)
    {
        if($request->ajax()) {
            $name = Input::get('name');
            if(strcasecmp($name, "state" == 0)) {
                $stateid = Input::get('select');
                $state = State::findOrFail($stateid);
                $cities = $this->return_city($state);
                return Response::json(["result" => array("name" => "cities", "value" => $cities)]);
            }
        }
    }

    /**
     * Handle upload of excel/csv files
     *
     * @param ParseExcelRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload(ParseExcelRequest $request)
    {
        $this->validate($request, [

        ]);

        if ($request->hasFile('excel')) {
            if ($request->file('excel')->isValid()) {

                $file = $request->file('excel');

                $this->load($file);
            }

            else
                dd("NONE1");
        }
        else
            dd("NONE2");
    }

    /*
     * Handle uploads to database using Excel
     *
     * */
    protected function load($file)
    {
        Excel::selectSheets('test')->load($file, function($reader) {

            $parse = $reader->select(array('company', 'repair', 'brand', 'amount'))->get();
            dd($parse);

        });
    }

    /**
     * @param State $state
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    private function return_city(State $state)
    {
        return $state->city()
                      ->orderBy('name', 'asc')
                      ->get()
                      ->toArray();
    }
}

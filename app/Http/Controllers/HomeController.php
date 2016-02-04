<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ParseExcelRequest;
use Excel;
use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
}

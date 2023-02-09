<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Invoice;
use Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('data.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if($request->has('mycsv')){
            // making it into an array
            //$data = array_map('str_getcsv', file($request->mycsv));
            $data = file($request->mycsv);

//            $header = $data[0];
//            unset($data[0]);

            // Chunking file
            $chunks = array_chunk($data,1000);
            // Converting chunks into files
            $path = resource_path('temp');


            foreach ($chunks as $key => $chunk){
                $name = "/tmp{$key}.csv";
                file_put_contents($path . $name ,  $chunk);
            }


//            foreach ($data as $value){
//                $arr_data = array_combine($header,$value);
//                Invoice::create($arr_data);
//            }

            // Will run on background
            // Calling all the csv files from the path
            $files = glob("$path./*.csv");
            $header = [];

            foreach ($files as $key => $file) {
                $data = array_map('str_getcsv', file($file));
                //Grabing header from the first file
                if ($key == 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                ProcessInvoice::dispatch($data,$header);
                unlink($file);
            }

            Session::flash('success', 'The data was successfully uploaded!');
            return Redirect()->back();

        }

        return Redirect::back();
    }

    /**
     * Uploading individual chunked filed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        // Will run on background
        $path = resource_path('temp');
        // Calling all the csv files from the path
        $files = glob("$path./*.csv");
        $header = [];

        foreach ($files as $key => $file) {
            $data = array_map('str_getcsv', file($file));
            //Grabing header from the first file
            if ($key == 0) {
                $header = $data[0];
                unset($data[0]);
            }
            ProcessInvoice::dispatch($data,$header);
            unlink($file);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

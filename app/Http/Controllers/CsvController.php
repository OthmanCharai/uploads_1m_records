<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CsvController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }


    public function store(Request $request){
        if($request->has('csv')){
            $csv = array_map('str_getcsv',file(Storage::path($request->file('csv')->store('avatars'))));
            $header=$csv[0];
            unset($csv[0]);
            $chunkes=array_chunk($csv,1000);
            foreach($chunkes as $key=>$value){
                $filename="/tmp{$key}.csv";
                $path=resource_path('temp');
                file_put_contents($path.$filename,json_encode($value));
            }
        }
    }

    public function store_file(){
        $path=resource_path('temp');
        $files=glob($path."/*");
        foreach($files as $key=>$file){
            $data=array_map('str_getcsv',file($file));
            dd($data);
        }
    }
}
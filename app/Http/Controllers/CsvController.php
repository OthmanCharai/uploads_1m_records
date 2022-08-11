<?php

namespace App\Http\Controllers;

use App\Jobs\CsvJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CsvController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }


    public function store(){
        $header=[];
        if(request()->has('csv')){
           $data=file(request()->csv);
           // chunking file
            $chunks=array_chunk($data,1000);
            $header=[];
            $batch  = Bus::batch([])->dispatch();
            foreach($chunks as $key=>$chunk){
                $data=array_map('str_getcsv',$chunk);
                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }
                $batch->add(new CsvJob($data, $header));
                
            }
            $this->find_batch_by_id($batch->id);
        }
    }

    public function find_batch_by_id($batchId)
    {
        $batch= Bus::findBatch($batchId);
        dd( [
           "id"=> $batch->id,
           "name"=> $batch->name,
           "totalJobs"=> $batch->totalJobs,
           "pendingJobs"=> $batch->pendingJobs,
           "failedJobs"=> $batch->failedJobs,
           "processedJobs"=> $batch->processedJobs(),
           "finished"=> $batch->finished(),
           "cancel"=> $batch->cancel(),

            
        ]);
    }

  

  
}
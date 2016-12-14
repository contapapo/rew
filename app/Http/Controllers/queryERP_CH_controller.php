<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class queryERP_CH_controller extends Controller
{
    public function getERP_CH_Daily() {
        
        $file = File::get('C:/wamp/www/rew/storage/Query/ERP-CH_Daily.sql');

   	$results = DB::select(DB::raw($file));

   	return view('rew.erp_ch_daily',['result'=>$results]);
        
    }
    
    public function saveExcel_Daily(){

        $file = File::get('C:/wamp/www/rew/storage/Query/ERP-CH_Daily.sql');
   		
   	$results = DB::select(DB::raw($file));
        
        $results = json_decode(json_encode($results), true);
           
        Excel::create('ERP-CH_Daily', function($excel) use ($results) {

        $excel->sheet('Excel sheet', function($sheet) use ($results) 
            {
                $sheet->fromArray($results);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }

    public function getERP_CH_Monthly() {
        
        $file = File::get('C:/wamp/www/rew/storage/Query/ERP-CH_Monthly.sql');
   		
   	$results = DB::select(DB::raw($file));

   	return view('rew.erp_ch_monthly',['result'=>$results]);
        
    }
    
    public function saveExcel_Monthly(){

        $file = File::get('C:/wamp/www/rew/storage/Query/ERP-CH_Monthly.sql');
   		
   	$results = DB::select(DB::raw($file));
        
        $results = json_decode(json_encode($results), true);
           
        Excel::create('ERP-CH_Monthly', function($excel) use ($results) {

        $excel->sheet('Excel sheet', function($sheet) use ($results) 
            {
                $sheet->fromArray($results);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }
}

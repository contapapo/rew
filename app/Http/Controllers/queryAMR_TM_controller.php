<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class queryAMR_TM_controller extends Controller
{
        public function getAMR_TM() {
        
        $file = File::get('C:/wamp/www/rew/storage/Query/AMR-Tm.sql');
        
   	$results = DB::select(DB::raw($file));

   	return view('rew.amr_tm',['result'=>$results]);
        
    }
    
    public function saveExcel(){

        $file = File::get('C:/wamp/www/rew/storage/Query/AMR-Tm.sql');
   		
   	$results = DB::select(DB::raw($file));
        
        $results = json_decode(json_encode($results), true);
           
        Excel::create('AMR-TM', function($excel) use ($results) {

        $excel->sheet('Excel sheet', function($sheet) use ($results) 
            {
                $sheet->fromArray($results);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
    }
}

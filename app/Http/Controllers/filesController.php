<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

session_start();

class filesController extends Controller
{     
    
    public function Comparer() {           

        //read file
        $file = 'C:/wamp/www/rew/storage/Query/Master_Meter.xls';
        $data = Excel::load($file, function($reader) {
                })->get();
        
        $meters = array();
        foreach ($data as $key) {
            $meters[] = $key['site'];
        }

        //read query
        $query = File::get('C:/wamp/www/rew/storage/Query/AMR-Tm.sql');
   	//run query	
   	$results = DB::select(DB::raw($query));
        
        //search for out of date values
        $filteredResults = collect($results)->filter(function ($result)
            {
                return Carbon::parse($result->cet) < Carbon::today();
            });   
        
        //transform values to compare with $meters
        $aArray2 = json_decode(json_encode($results), true);
        $sql = array();
        foreach ($aArray2 as $key) {
            $sql[] = $key['site'];
        }
        
        //compare file x query to obtain 'site' not in query
        $comp = array_diff($meters,$sql);
        
//        $comp[2]='00001581_LS2';
//        $comp[0]='00027987_LS2';//        ¯\_(ツ)_/¯ 
        
        $str = implode("' or site ='" ,$comp);
        
        $lost_meter =
            DB::select("SELECT site, sn, MAX(cet) as cet FROM premasol.std_ls2_4w WHERE "
                    . "site = '".$str."' GROUP BY site ORDER BY site, MAX(cet);");

        $_SESSION['filteredResults'] = $filteredResults;
        $_SESSION['lost_meter'] = $lost_meter;
 
        return view('rew.comp',['filteredResults'=>$filteredResults,'lost_meter'=>$lost_meter]);
        }  
        
    public function saveExcelComp(){

        $filteredResults = $_SESSION['filteredResults'];                
        $lost_meter = $_SESSION['lost_meter'];

        $filteredResults = json_decode(json_encode($filteredResults), true);
        $lost_meter = json_decode(json_encode($lost_meter), true);

        Excel::create('Devices', function($excel) use ($filteredResults,$lost_meter) {

        $excel->sheet('Meters_OutOfDate', function($sheet) use ($filteredResults)
            {
                $sheet->fromArray($filteredResults);
                $sheet->setOrientation('landscape');
            });
            
        $excel->sheet('Meters_NotSending', function($sheet) use ($lost_meter)
            {
                $sheet->fromArray($lost_meter);
                $sheet->setOrientation('landscape');
            });
        })->export('xls');
        
        return view('rew.welcome');
    }
    
    public function move_files() {
        $year = date('Y');
        $month = date('m');
        
        $path_year = 'C:/Users/julio/Downloads/'.$year.'/';
        $path_month = 'C:/Users/julio/Downloads/'.$year.'/'.$month.'/';
        
        if (!file_exists($path_year))
        File::makeDirectory('C:/Users/julio/Downloads/'.$year.'/');
        if (!file_exists($path_month))
        File::makeDirectory('C:/Users/julio/Downloads/'.$year.'/'.$month.'/');
        
//        Devices
        if(file_exists($source1 = 'C:/Users/julio/Downloads/Devices.xls')){
        $cible1 = 'Devices'.date('__d-m-Y__H-i-s').'.xls';
        File::move($source1,$path_month.$cible1);
        }
        
//        AMR-TM
        if(file_exists($source1 = 'C:/Users/julio/Downloads/AMR-TM.xls')){
        $cible1 = 'AMR-TM'.date('__d-m-Y__H-i-s').'.xls';
        File::move($source1,$path_month.$cible1);
        }
        
//        ERP-CH Daily
        if(file_exists($source2 = 'C:/Users/julio/Downloads/ERP-CH_Daily.xls')){
        $cible2 = 'ERP-CH_Daily'.date('__d-m-Y__H-i-s').'.xls';
        File::move($source2,$path_month.$cible2);
        }

//        ERP-CH Monthly
        if(file_exists($source3 = 'C:/Users/julio/Downloads/ERP-CH_Monthly.xls')){
        $cible3 = 'ERP-CH_Monthly'.date('__d-m-Y__H-i-s').'.xls';
        File::move($source3,$path_month.$cible3);
        }
        
        return view('rew.welcome');
    }
}

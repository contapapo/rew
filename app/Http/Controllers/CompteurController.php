<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compteur;
use Excel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;



class CompteurController extends Controller
{
    public function getDevices(){

	//    $devices = Compteur::all()->where('Site','=','COFOCO');

      $devices = Compteur::all();

       return view('rew.compteurs',['device'=>$devices]);
    }

    public function saveExcel(){

    	$devices = Compteur::all();	

 	  	Excel::create('Laravel Excel', function($excel) use ($devices) {
	
	    $excel->sheet('Excel sheet', function($sheet) use ($devices) {
	
	               $sheet->fromArray($devices);
	
	        $sheet->setOrientation('landscape');
	    });

		})->export('xls');
    }

   	public function getQuery1(){

   		$file = File::get('C:/wamp/www/rew/storage/Query/MissingMeter_Main.sql');
   		
   		$query1 = DB::select(DB::raw($file));

   		return ($query1);


}
}
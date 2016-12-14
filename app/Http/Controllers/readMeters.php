<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meters;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class readMeters extends Controller
{
        public function Comparer3() {
         $file = File::get('C:/Users/julio/Desktop/JULIO/Query/AMR-Tm.sql');
   	//run query	
   	$results = DB::select(DB::raw($file));
        //   var_dump($results);    
           
           $results2 = DB::select("SELECT * FROM premasol.std_ls2_4w   GROUP BY site  ;");
           var_dump($results2);
           
        }
    
    
}

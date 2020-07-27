<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;

class testredacocontroller extends Controller {
    public function index(Request $request) 
    {
        $background =   $request->input('background');
        
        if ($background == "dark") {
            return response()->json([
                                    'code' => 200 ,
                                    'status'=>'success', 
                                    'message'=>'dark_background'
                                    ]);
        } elseif ($background == "") {
            return response()->json([
                                    'code' => 200 ,
                                    'status'=>'success', 
                                    'message'=>'light_background'
                                    ]);
        } else {
            return response()->json([
                'code' => 500 ,
                'status'=>'error', 
                'message'=>'something when wrong'
                ]);
        }
    }

    public function shot(Request $request)
    {
        $shot =   $request->input('shot');

        if ($shot != "") {

            $getshot    =   DB::table('dribbble_shot')->get();
            $data       =   [];
            $i          =   0;

            foreach ($getshot as $key => $shot) {
                $image      =   $shot->image;
                $lovecount  =   $shot->love_count;

                $data[$i]["image"]      =   $image;
                $data[$i]["love_count"] =   $lovecount;

                $i++;
            }
            return response()->json([
                'code' => 200 ,
                'status'=>'success', 
                'data'=> $data
                ]);
        } else {
            return response()->json([
                'code' => 400 ,
                'status'=>'error', 
                'message'=>'You haven’t shots yet'
                ]);
        }
    }
    
}
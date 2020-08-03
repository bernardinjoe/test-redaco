<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\redaco_test;
use DB;
use Artisan;

class testredacocontroller extends Controller {
    public function redaco() 
    {
        return view('redaco');
        // $background =   $request->input('background');
        
        // if ($background == "dark") {
        //     return response()->json([
        //                             'code' => 200 ,
        //                             'status'=>'success', 
        //                             'message'=>'dark_background'
        //                             ]);
        // } elseif ($background == "" || $background == "light") {
        //     return response()->json([
        //                             'code' => 200 ,
        //                             'status'=>'success', 
        //                             'message'=>'light_background'
        //                             ]);
        // } else {
        //     return response()->json([
        //         'code' => 500 ,
        //         'status'=>'error', 
        //         'message'=>'something when wrong'
        //         ]);
        // }
    }

    public function shot(Request $request)
    {
        $shot =   $request->shot;
        if ($shot != "") {
            return redirect('getshot');
        } else {
            return redirect('notshotyet');
        }
        
        // $shot =   $request->input('shot');

        // if ($shot != "") {

        //     $getshot    =   DB::table('dribbble_shot')->get();
        //     $data       =   [];
        //     $i          =   0;

        //     foreach ($getshot as $key => $shot) {
        //         $image      =   $shot->image;
        //         $lovecount  =   $shot->love_count;

        //         $data[$i]["image"]      =   $image;
        //         $data[$i]["love_count"] =   $lovecount;

        //         $i++;
        //     }
        //     return response()->json([
        //         'code' => 200 ,
        //         'status'=>'success', 
        //         'data'=> $data
        //         ]);
        // } else {
        //     return response()->json([
        //         'code' => 400 ,
        //         'status'=>'error', 
        //         'message'=>'You haven’t shots yet'
        //         ]);
        // }
    }

    public function getshot()
    {
        $data   =   redaco_test::all();
        return view('shot', ['data' => $data]);
    }

    public function seed()
    {
        try {
            Artisan::call('db:seed --class=testRedacoSeeder');

            return redirect('/CRUD/home');
        } catch (\Throwable $th) {
            return view('notyet');
        }
    }

    public function test()
    {
        try {
            $test = redaco_test::all();
            return view('redacoHome', ['data' => $test]);
        } catch (\Throwable $th) {
            return view('notyet');
        }
        // $test = redaco_test::all();
        // if (isset($test)) {
        //     return view('redacoHome', ['data' => $test]);
        // } else {
        //     dd('salah');
        // }
    }
    
    public function add()
    {
    	return view('add_new');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg'
        ]);
        
		$file       = $request->file('image');
		$filename   = $file->getClientOriginalName();
        $folder     = 'images';
        
		$file->move($folder,$filename);
 
		redaco_test::create([
			'image' => $filename,
			'love_count' => $request->love_count,
		]);
 
    	return redirect('/CRUD/home');
    }

    public function edit($id)
    {
        $test = redaco_test::find($id);
        return view('edit', ['data' => $test]);
    }

    public function update($id, Request $request)
    {
        $file       = $request->file('image');
        
        if ($file != null) {
            $file       = $request->file('image');
            $filename   = $file->getClientOriginalName();
            $folder     = 'images';
            $file->move($folder,$filename);

            $test = redaco_test::find($id);
            $test->image = $filename;
            $test->love_count = $request->love_count;
            $test->save();
        } else {
            $test = redaco_test::find($id);
            $test->love_count = $request->love_count;
            $test->save();
        }

        return redirect('/CRUD/home');
    }

    public function delete($id)
    {
        $test = redaco_test::find($id);
        $test->delete();

        return redirect('/CRUD/home');

    }

    public function like($id)
    {
        $data       =   redaco_test::all();

        $test       =   redaco_test::find($id);
        $oldlove    =   $test->love_count;

        $update     =   redaco_test::find($id);
        $update->love_count = $oldlove+1;
        $update->save();


        return redirect('getshot');
    }

    public function unlike($id)
    {
        $data       =   redaco_test::all();

        $test       =   redaco_test::find($id);
        $oldlove    =   $test->love_count;
        
        $update     =   redaco_test::find($id);
        $update->love_count = $oldlove-1;
        $update->save();


        return redirect('getshot');
    }
}
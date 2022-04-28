<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return view("welcome");
      ;

    }

    public function getcont()
    {
     $data = Test::orderby('id','ASC')->get();
        return $data;
    } 

     public function addTest(Request $req)
    {
        $test = new Test();
        $test->title=$req->title;
        $test->body=$req->body;
        $test->save();

        return Response()->json(['etat'=>true,'id'=>$test->id]);
        // return $test->id;
    }
    public function updateTest(Request $req)
    {
       
        $test =Test::find($req->id)->first();
        $test->title=$req->title;
        $test->body=$req->body;
        $test->save();
        return Response()->json(['etat'=>true]);
        // return $req->id;
    }
    public function deleteTest($id)
    {  
        $test =Test::find($id);
        $test->delete();
        return Response()->json(['etat'=>true]);
    }
}

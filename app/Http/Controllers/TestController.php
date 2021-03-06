<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\PrescribedTest;

class TestController extends Controller
{
    //
    public function Index() {
        $tests=Test::all();
        return $tests;
    }

    /*Adding new test to tests table 
    when doctor doesn't choose any from existing tests from table */
    public function NewTest(Request $request) {
        $test=new Test;
        $test->name=$request->name;
        $test->save();
        return $test;
    }

    //Adding tests to prestest table when doctor is writing a prescription
    public function NewPrescribedTest(Request $request)
    {
        $test=new PrescribedTest;
        $test->prescription_id=$request->prescription_id;
        $test->test_id=$request->test_id;
        $test->save();
        return $test;
    }

    public function show($pres,$test)
    {
        //
        $test=PrescribedTest::find($test);
        $test->test;
        return view('pages.report')->with('test',$test);
    }
}

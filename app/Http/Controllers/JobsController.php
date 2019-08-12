<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    public function index()
    {
        //
        $jobs = Job::paginate(8);
        return view('welcome',compact('jobs'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id , Job $job)
    {
        //dd($job);
        return view('jobs.show',compact('job'));

    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

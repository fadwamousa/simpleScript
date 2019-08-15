<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Http\Requests\jobpostRequest;
use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer')->except(['index','show','apply']);
    }





    public function index()
    {
        //
        $jobs = Job::paginate(8);
        return view('welcome',compact('jobs'));
    }


    public function myjob(){
        $user_id = Auth::user()->id;
        $jobs    = Job::where('user_id',$user_id)->get();
        return view('jobs.myjobs',compact('jobs'));
    }

   /* public function apply(Request $request , $id){




        $user_id = Auth::user()->id;
        $jobID = Job::findOrFail($id);
        $jobID->users()->attach($user_id);


          \DB::table('job_user')->create([

            'user_id'=>Auth::user()->id,

            'job_id'=>$id

        ]);

        return redirect()->back()->with('message','Application Is Created ');



    }
    */


    public function apply(Request $request,$id) {
        $jobID = Job::find($id);
        $jobID->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');

    }


    public function applicant(){
        $applicants = Job::has('users')->where('user_id',Auth::user()->id)->get();
        return view('jobs.applicant',compact('applicants'));
    }





    public function create()
    {
        //
        $categories = Category::all();
        return view('jobs.create',compact('categories'));
    }


    public function store(jobpostRequest $request)
    {
       $user_id    = Auth::user()->id;
       $company    = Company::where('user_id',$user_id)->first();
       $company_id = $company->id;

       Job::create([
           'company_id'  => $company_id,
           'user_id'     => $user_id,
           'title'       => $request->title,
           'description' => $request->description,
           'slug'        => $request->slug,
           'roles'       => $request->roles,
           'address'     => $request->address,
           'position'    => $request->position,
           'category_id' => $request->category_id,
           'type'        => $request->type,
           'status'      => $request->status,
           'last_date'   => $request->last_date
       ]);

       return redirect()->back()->with('message','Job Is Created ');


    }

    public function show($id , Job $job)
    {
        //dd($job);
        return view('jobs.show',compact('job'));

    }

    public function edit($id)
    {
        //

        $job = Job::findOrFail($id);
        $categories = Category::all();
        return view('jobs.edit',compact('job','categories'));
    }


    public function update(Request $request, $id)
    {
        $user_id    = Auth::user()->id;
        $company    = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        $job = Job::findOrFail($id);
        $job->update([

            'company_id'  => $company_id,
            'user_id'     => $user_id,
            'title'       => $request->title,
            'description' => $request->description,
            'slug'        => $request->slug,
            'roles'       => $request->roles,
            'address'     => $request->address,
            'position'    => $request->position,
            'category_id' => $request->category_id,
            'type'        => $request->type,
            'status'      => $request->status,
            'last_date'   => $request->last_date

        ]);



        return redirect()->back()->with('message','Job Is Updated ');
    }


    public function destroy($id)
    {
        //
    }
}

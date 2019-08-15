<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use App\Company;
class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('employer')->except(['index']);
    }

    public function index($id , Company $company)
    {
          $jobs = Job::where('user_id',$id)->get();
          return view('company.index',compact('company'));

    }


    public function create()
    {
        //
        return view('company.create');
    }

    public function store(Request $request)
    {



        $user_id = auth()->user()->id;
        Company::where('user_id',$user_id)->update([
            'address'         => request('address'),
            'phone'           => request('phone'),
            'website'         => request('website'),
            'slogan'          => request('slogan'),
            'Description'     => request('Description')
        ]);

        return redirect()->back()->with('message' , 'Company updated');
    }

    public function coverphoto(Request $request){

        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){

            $file     = $request->file('cover_photo');
            $ext      = $file->getClientOriginalExtension();
            $fileName = time().''.$ext;
            $file->move('uploads/coverphoto',$fileName);

            Company::where('user_id',$user_id)->update([

                'cover_photo' => $fileName
            ]);


        }


        return redirect()->back()->with('message','Cover Photo is Updated');
    }

    public function logo(Request $request)
    {

        $user_id = auth()->user()->id;
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '' . $ext;
            $file->move('uploads/logo', $fileName);

            Company::where('user_id', $user_id)->update([

                'logo' => $fileName
            ]);

        }

        return redirect()->back()->with('message','Logo Photo is Updated');



    }



}

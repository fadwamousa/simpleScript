<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{

    public function index()
    {
        //
        return view('profile.index');
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'address'   => 'required',
            'bio'       => 'required|min:20',
            'experience'=> 'required|min:20',
            'phone'     => 'regex:/(20)[0-9]{9}/'
        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id',$user_id)->update([
            'address'    => request('address'),
            'experience' => request('experience'),
            'bio'        => request('bio'),
            'phone'      => request('phone')
        ]);

        return redirect()->back()->with('message' , 'Profile updated');
    }

    public function coverletter(Request $request){

        $this->validate($request,[
            'cover_letter'  => 'required|mimes:pdf,doc,docx|max:20000'
        ]);


        $user_id = auth()->user()->id;

        $cover   = $request->file('cover_letter')->store('public/files');

        Profile::where('user_id',$user_id)->update([

            'cover_letter' => $cover
        ]);

        return redirect()->back()->with('message','Cover Letter is Updated');



    }

    public function resume(Request $request){

        $this->validate($request,[
            'resume'  => 'required|mimes:pdf,doc,docx|max:20000'
        ]);

        $user_id = auth()->user()->id;
        $resume  = $request->file('resume')->store('public/files');

        Profile::where('user_id',$user_id)->update([

            'resume' => $resume
        ]);

        return redirect()->back()->with('message','Resume is Updated');

    }

    public function avatar(Request $request){

        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){

            $file     = $request->file('avatar');
            $ext      = $file->getClientOriginalExtension();
            $fileName = time().''.$ext;
            $file->move('uploads/avatar',$fileName);

            Profile::where('user_id',$user_id)->update([

                'avatar' => $fileName
            ]);

            return redirect()->back()->with('message','Avatar is Updated');




        }

    }


    public function show($id)
    {
        //
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

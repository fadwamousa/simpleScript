<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{

    public function index()
    {

        $contacts = Contact::all();
        return view('contacts.index')->with('contacts',$contacts);
    }

    public function create()
    {
        //
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        //Validate
        $rules = ['name' => 'required','address'=>'required','phone'=>'required|numeric'];
        $this->validate($request,$rules);

        //Create
         Contact::create([
            'name'    => $request->get('name') ,
            'address' => $request->get('address'),
            'phone'   => $request->get('phone')
        ]);

         Session::put('message','The Contacts Is Sent to DB');

         return redirect()->back();





    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $contact = Contact::findOrFail($id);

        return view('contacts.edit')->with('contact',$contact);


    }


    public function update(Request $request, $id)
    {
        //
        $contact = Contact::findOrFail($id);


        //Create
        $contact->update([
            'name'    => $request->get('name') ,
            'address' => $request->get('address'),
            'phone'   => $request->get('phone')
        ]);

        Session::put('message','The Contacts Is Updated to DB');

        return redirect()->route('Home.Conatcs');
    }


    public function destroy($id)
    {
        //
        $contact = Contact::findOrFail($id)->delete();
        Session::put('message','The Contacts Is Removed From DB');
        return redirect()->back();
    }
}

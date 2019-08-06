<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Response;
class AjaxController extends Controller
{

    public function index()
    {
        //
        $contacts = Contact::orderBy('id','DESC')->paginate(4);
        return view('contacts.ajax_curd')->with('contacts',$contacts);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $contacts = Contact::create([
            'name'    => $request->name,
            'address' => $request->address,
            'phone'   => $request->phone]);
        return Response::json($contacts);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $contact = Contact::findOrFail($id);
        return Response::json($contact);
    }


    public function update(Request $request, $id)
    {
        //


        $contact = Contact::findOrFail($id);
        $input = $request->all();
        $contact->update($input);
        return Response::json($contact);
    }

    public function destroy($id)
    {
        //
        $contact = Contact::where('id',$id)->delete();

        return Response::json($contact);
    }
}

<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function index()
    {
        //
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    public function store(Request $request)
    {
        //

        $contact = Contact::create($request->all());
        return response()->json($contact);
    }

    public function show($id)
    {
        //
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }



    public function update(Request $request, $id)
    {

        $contact = Contact::findOrFail($id);

        if($contact->update($request->all())){

            return "The Data is Updated";

        }else{

            return "The Data is Not Edit";

        }

    }

    public function destroy($id)
    {
        //

        $contact = Contact::findOrFail($id);
        $contact->delete();
        return "The record is Deleted";
    }
}

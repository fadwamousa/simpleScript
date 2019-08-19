<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\User;
use App\Profile;
use Hash;
class EmployerRegisterController extends Controller
{
    //
    public function registerEmp(){

        $user =  User::create([
            'name' => 'fadwa',
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'user_type' => request('user_type')
        ]);

        Company::create([

            'user_id'  => $user->id,
            'name'     => request('name'),
            'slug'     => str_slug(request('name'))
        ]);

        return redirect()->back()->with('message','Please Verify the email by clicking link');

    }
}

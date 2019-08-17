<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function index()
    {
        $jobs = Auth::user()->favorites;
        return view('home',compact('jobs'));
    }
}

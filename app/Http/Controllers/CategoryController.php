<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function index($id){
        $jobs = Job::where('category_id',$id)->paginate(20);
        $catName = Category::where('id',$id)->first();
        return view('jobs.jobs_category',compact('jobs','catName'));
    }
}

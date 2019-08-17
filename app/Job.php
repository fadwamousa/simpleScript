<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public $table = 'jobs';

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'Slug';
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    public function checkApplication(){
       return  \DB::table('job_user')->where('user_id',auth()->user()->id)
                                          ->where('job_id',$this->id)
                                          ->exists();
    }

    public function favorites(){
        return $this->belongsToMany(User::class,'favorites','job_id','user_id')->withTimeStamps();
    }

    public function checkSaved(){
        return  \DB::table('favorites')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)
            ->exists();
    }


}

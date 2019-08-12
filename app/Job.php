<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    public $table = 'jobs';

    public function getRouteKeyName()
    {
        return 'Slug';
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }


}

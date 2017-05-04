<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Baseinfo extends Model
{
    protected $fillable = ['patient_id', 'times', 'recorder', 'bingli', 'mphone', 'phone', 'email', 'address', 'qq', 'weixin', 'job_status', 'job', 'education', 'living', 'living_status'];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function clinical()
    {
        return $this->hasOne('App\Models\Clinical');
    }

    public function epibio()
    {
        return $this->hasOne('App\Models\Epibio');
    }

    public function result()
    {
        return $this->hasOne('App\Models\Result');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    
    protected  $fillable = ['patient_id', 'times', 'completed'];
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function baseinfo()
    {
        return $this->hasOne('App\Models\Baseinfo');
    }
    public function epibio()
    {
        return $this->hasOne('App\Models\Epibio');
    }
    public function clinical()
    {
        return $this->hasOne('App\Models\Clinical');
    }
    public function result()
    {
        return $this->hasOne('App\Models\Result');
    }
}

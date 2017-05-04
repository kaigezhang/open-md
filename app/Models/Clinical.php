<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinical extends Model
{
    protected $fillable = ['baseinfo_id', 'diagnosis', 'd_course', 'symptom', 'ml_area', 'olp_type'];

    public function baseinfo()
    {
        return $this->belongsTo('App\Models\Baseinfo');
    }

    public function olps()
    {
        return $this->hasMany('App\Models\Olp');
    }

    public function olks()
    {
        return $this->hasMany('App\Models\Olk');
    }
}

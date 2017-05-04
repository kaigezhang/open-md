<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = ['user_id', 'number', 'name', 'gender', 'card_id', 'case_number'];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function baseinfos()
    {
        return $this->hasMany('App\Models\Baseinfo');
    }

    public function epibios()
    {
        return $this->hasManyThrough('App\Models\Epibio', 'App\Models\Baseinfo');
    }
    public function clincials()
    {
        return $this->hasManyThrough('App\Models\Clinical', 'App\Models\Baseinfo');
    }
    public function results()
    {
        return $this->hasManyThrough('App\Models\Result', 'App\Models\Baseinfo');
    }

//    public function epibios()
//    {
//        return $this->hasMany('App\Models\Epibio');
//    }
//    public function clinicals()
//    {
//        return $this->hasMany('App\Models\Clinical');
//    }
//    public function results()
//    {
//        return $this->hasMany('App\Models\Result');
//    }
//    public function olps()
//    {
//        return $this->hasManyThrough('App\Models\Olp', 'App\Models\Clinical');
//    }
//    public function olks()
//    {
//        return $this->hasManyThrough('App\Models\Olk', 'App\Models\Clinical');
//    }
//    public function cancers()
//    {
//        return $this->hasManyThrough('App\Models\Cancer', 'App\Models\Result');
//    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['baseinfo_id', 'blood_img', 'blood_sugar_img', 'liver_img', 'sharp_teeth', 'bad_fit', 'calculus', 'sys_treat', 'sys_drug', 'sys_time', 'topical_treat', 'topical_drug', 'topical_time', 'comment'];
    public function baseinfo()
    {
        return $this->belongsTo('App\Models\Baseinfo');
    }

    public function cancers()
    {
        return $this->hasMany('App\Models\Cancer');
    }
}

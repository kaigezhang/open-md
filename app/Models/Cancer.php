<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancer extends Model
{
    protected $fillable = ['result_id', 'part', 'velscope', 'velscope_img', 'toluidine', 'toluidine_img', 'biospy', 'biospy_img'];
    
    public function result()
    {
        return $this->belongsTo('App\Models\Result');
    }
}

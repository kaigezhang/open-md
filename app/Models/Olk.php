<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olk extends Model
{
    protected $fillable = ['clinical_id', 'site', 'site_long', 'site_wide', 'type', 'site_img', 'cancer'];
    public function clinical()
    {
        return $this->belongsTo('App\Models\Clinical');
    }
}

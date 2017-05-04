<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Olp extends Model
{
    protected $fillable = ['clinical_id', 'site', 'bw', 'cx', 'ml_long', 'ml_wide', 'site_img', 'cancer'];

    public function clinical()
    {
        return $this->belongsTo('App\Models\Clinical');
    }
}

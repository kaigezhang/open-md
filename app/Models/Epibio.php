<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epibio extends Model
{
    protected $fillable = ['baseinfo_id', 'smoke', 'smo_age', 'quit_smoking', 'smo_num', 'smo_type', 'smo_quit_time', 'passive_smo', 'smo_comments', 'drink', 'dri_age', 'quit_dri', 'capacity', 'dri_type', 'dri_quit_time', 'dri_comments', 'tabacoo', 'tabacoo_dos', 'betel', 'betel_dos', 'food', 'sys_d', 'sys_d_details', 'fami_d', 'fami_d_details', 'drug', 'drug_details'];

    public function baseinfo()
    {
        return $this->belongsTo('App\Models\Baseinfo');
    }
}

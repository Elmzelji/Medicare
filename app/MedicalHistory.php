<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public $timestamps = true;
}

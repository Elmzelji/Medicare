<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use SoftDeletes;
    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
    public $timestamps = true;
}

<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function histories()
    {
        return $this->hasMany('App\MedicalHistory');
    }
    use SoftDeletes;
    public $timestamps = true;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";

    protected $guarded = [];

    public function pegawai (){
        return $this->hasMany('App\Models\DynamicPdf');
    }
}

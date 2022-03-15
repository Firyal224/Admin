<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pegawai;

class DynamicPdf extends Model
{
   
    public function data (){
        return $this->belongsTo(Pegawai::class);
    }
}

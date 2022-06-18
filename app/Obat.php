<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    //
    protected $table = 'obat';

    public function kategori(){
        return $this->belongsTo('App\Kategori','kategori_id');
    }

}

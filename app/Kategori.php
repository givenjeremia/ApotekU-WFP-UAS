<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = 'kategori';
    public function obat(){
        return $this->hasMany('App\Obat','kategori_id','id');
        
    }

}

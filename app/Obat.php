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

    public function transaksi(){
        return $this->belongsToMany('App\Transaksi','obat_transaksi','transaksi_id','obat_id')->withPivot('kuantitas','harga');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObatTransaksi;
use App\Transaksi;

class LaporanController extends Controller
{
    public function ObatTerlaris()
    {
        #belum sesuai pdf
        $data = ObatTransaksi::all();
        $max = $data->max('kuantitas');
        $laris = $data->where('kuantitas', $max);
        dd($laris);
    }

    public function CustomerLoyal()
    {
        #belum sesuai pdf
        $data = Transaksi::all();
        $max = $data->max('total');
        $loyal = $data->where('total', $max);
        dd($loyal);
    }
}

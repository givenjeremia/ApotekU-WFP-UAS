<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObatTransaksi;
use App\Transaksi;
use App\Obat;
use App\User;

class LaporanController extends Controller
{
    public function ObatTerlaris()
    {
        $dataTransaksi = Transaksi::all();
        $dataObat = Obat::all();
        $arr = array(); 
        foreach($dataObat as $do){
            $jumlah = 0;
            foreach($dataTransaksi as $dt){
                foreach($dt -> obat as $o){
                    if($o -> id == $do -> id){
                        $jumlah = $jumlah + ($o-> pivot -> kuantitas);
                        // dd($jumlah);
                    }
                }
            }
            $arr[$do->id] = array('obat'=>$do, 'kuantitas'=>$jumlah);
        }
        $arr = collect($arr) -> sortByDESC('kuantitas');
        // dd($arr);
        

        return view('report.terlaris', compact('arr'));
        
    }

    public function CustomerLoyal()
    {
        $dataTransaksi = Transaksi::all();
        $dataUser = User::all();
        $arr = array(); 
        foreach($dataUser as $du){
            $jumlah = 0;
            foreach($dataTransaksi as $dt){
                if($dt -> user ->id == $du -> id){
                    $jumlah = $jumlah + ($dt -> total);
                    // dd($jumlah);
                }
                
            }
            $arr[$du->id] = array('user'=>$du, 'total'=>$jumlah);
        }
        $arr = collect($arr) -> sortByDESC('total');
        // dd($arr);
        

        return view('report.terloyal', compact('arr'));
    }
}

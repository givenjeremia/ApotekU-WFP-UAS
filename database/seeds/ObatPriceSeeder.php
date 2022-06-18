<?php

use Illuminate\Database\Seeder;

class ObatPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('obat')->where('kategori_id',1)->update(
            [
                'harga' => 10000
            ]
        );
        DB::table('obat')->where('kategori_id',2)->update(
            [
                'harga' => 20000
            ]
        );
        DB::table('obat')->where('kategori_id',3)->update(
            [
                'harga' => 30000
            ]
        );
        DB::table('obat')->where('kategori_id',4)->update(
            [
                'harga' => 40000
            ]
        );
        DB::table('obat')->where('kategori_id',5)->update(
            [
                'harga' => 50000
            ]
        );
        DB::table('obat')->where('kategori_id',6)->update(
            [
                'harga' => 60000
            ]
        );
        DB::table('obat')->where('kategori_id',6)->update(
            [
                'harga' => 60000
            ]
        );
        DB::table('obat')->where('kategori_id',7)->update(
            [
                'harga' => 70000
            ]
        );
        DB::table('obat')->where('kategori_id',8)->update(
            [
                'harga' =>80000
            ]
        );
        DB::table('obat')->where('kategori_id',9)->update(
            [
                'harga' => 90000
            ]
        );
        DB::table('obat')->where('kategori_id',10)->update(
            [
                'harga' => 100000
            ]
        );
    }
}

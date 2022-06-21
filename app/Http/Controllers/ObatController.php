<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Kategori;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $list_data = Obat::all();
        $kategori = Kategori::all();
        return view('obat.index',['data'=>$list_data,'kategori'=>$kategori]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('obat.create' , ['kategori'=>$kategori] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $obat)
    {
        $obat = Obat::find($obat);
        $obat->nama_obat=$request->get('nama_obat');
        $obat->formula=$request->get('formula');
        $obat->restriction_formula=$request->get('restriction_formula');
        $obat->deskripsi=$request->get('deskripsi');
        $obat->harga=$request->get('harga');
        $obat->gambar="Fentanil.jpg";

        $obat->faskes_tk1 = !empty($request->get('faskes_tk1'))  ? 1 : 0; 
        $obat->faskes_tk2 = !empty($request->get('faskes_tk2'))  ? 1 : 0; 
        $obat->faskes_tk3 = !empty($request->get('faskes_tk3'))  ? 1 : 0; 
        // $obat->gambar=$request->get('gambar');
        $obat->kategori_id=$request->get('kategori_id');

        $obat->save();
        return redirect()->route('obat.index')->with('status','Data Obat telah terubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Obat $obat)
    {
        //
        
    }
    public function front_index(Request $request)
    {
        $cari = !empty($request->get('cari'))  ? $request->get('cari') : session()->get("cari"); 

        session()->put('cari',$cari);
        $list_data = Obat::where('nama_obat', 'LIKE', '%'.session()->get("cari").'%')->paginate(8);
        if ($request->ajax()) {
            return view('frontend.page', ['obat'=>$list_data]);
        }
        return view('frontend.obat',['obat'=>$list_data]);
    }
    public function addToCart($id)
    {
        $product = Obat::find($id);
        $cart = session()->get("cart");
        if(!isset($cart[$id])){
            $cart[$id] = [
                "name" => $product->nama_obat,
                "form" => $product->formula,
                "kuantitas" => 1,
                "harga" => $product->harga,
                "gambar" => $product->gambar
            ];
        }
        else{
            $cart[$id]["kuantitas"]++;
        }
        session()->put("cart", $cart);
        return redirect()->back()->with("status","Obat added to cart successfully!");

    }

    public function deleteItemCart($id)
    {
        $cart = session()->get("cart");
        unset($cart[$id]);
        session()->put("cart", $cart);
        return redirect()->back()->with("status","Obat delete to cart successfully!");
    }


    public function cart()
    {
        return view("frontend.cart");
    }

    public function getEditForm(Request $request){
        $id=$request->get('id');
        $data= Obat::find($id);
        $kategori = Kategori::all();
        // dd($data);
        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('obat.update',compact('data','kategori'))->render()
        ),200);
    }

    public function awalan(){
        $list_data = "halo";
        return view('obat.awalan',['data'=>$list_data]);
    }
}

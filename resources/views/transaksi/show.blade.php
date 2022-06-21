@extends('layouts.frontend')

@section('content')
<div class="portlet">
    <div class="portlet-title">
        <b>Pemesanan Dari Transaksi Kode : {{ $transaksi->id }}</b>
        <b>Tanggal Pemesanan : {{ $transaksi->tanggal_transaksi }}</b>
    </div>
    <div class="portlet-body">
        <div class="row">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi->obat as $item)
                    <tr>
                        <td data-th="obat">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ asset(($item->gambar == '') ? 'img/no_image.png' : 'img/'.$item->gambar ) }}" width="50%"  alt="..."
                                        class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $item->nama_obat }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{ number_format($item->harga,2) }}</td>
                        <td data-th="Quantity">
                            {{ $item->pivot->kuantitas }}
                        </td>
                        <td data-th="Subtotal" class="text-center">Rp. {{ number_format($item->pivot->harga,2) }}</td>
                        {{-- <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total : {{ $transaksi->total }}</strong></td>
                    </tr>
                    <tr>
                        <td><a href="{{ url('/home') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Kembali Ke Daftar Pesanan </a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total : {{ $transaksi->total }}</strong></td>
                        <td class="hidden-xs"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
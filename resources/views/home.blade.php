@extends('layouts.frontend')

@section('content')

<h1>Riwayat Transaksi</h1>
<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:10%">Kode</th>
        <th style="width:50%">Waktu Transaksi</th>
        <th style="width:30%" class="text-center">Total</th>
        <th style="width:10%"></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($transaksi as $item)
        <tr>
            <td data-th="Kode">
                {{ $item->id }}
            </td>
            <td data-th="Waktu">
                {{ $item->tanggal_transaksi }}
            </td>
            <td data-th="Total">
                {{ $item->total }}
            </td>
            <td class="actions" data-th="">
                <a href="{{ route('transaksi.show',$item->id ) }}" class="btn btn-info btn-sm update-cart" data-id="{{ $item->id}}">
                    View
                </a>
            </td>
        </tr>
            
        @endforeach
    </tbody>
    
</table>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

<div class="row" id='load'>
    @foreach ($obat as $item)

    <div class="col-xs-18 col-sm-6 col-md-3">
        <div class="thumbnail">
            <img src="{{ asset(($item->gambar == '') ? 'img/no_image.png' : 'img/'.$item->gambar ) }}" alt="" width="25%">
            <div class="caption">
                <h4>{{ $item->nama_obat}} <span>{{ $item->formula }}</span> </h4>
                <p>{{ Str::limit(strtolower($item->deskripsi), 50, '...') }}</p>
                <p><strong>Price: </strong>Rp. {{ number_format($item->harga, 2) }}</p>
                <p class="btn-holder"><a href="/add-to-cart/{{ $item->id }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
            </div>
        </div>
    </div>

    @endforeach

        {!! $obat->render() !!}
</div>

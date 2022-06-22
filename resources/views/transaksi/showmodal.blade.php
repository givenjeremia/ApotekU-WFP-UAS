<div class="portlet">
  <div class="portlet-title">
    <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->tanggal_transaksi}}</b>
  </div>
  <div class="portlet-body">
    <div class='row'>
      <div class="col-md-4">
      @foreach($data->obat as $a)
          <div class="tumbnail">
            <div class="caption">
              <h2>{{ $a->nama_obat }}</h2>
              <img src="{{ asset('img/').'/'.$a->nama_obat.'.jpg' }}" height='200px' /></a> <br>
              <p>Jumlah Beli: {{ $a->pivot->kuantitas }}</p>
              <p>Kategori: {{ $a->kategori->name }} ,-</p>
              <p>Harga per obat: Rp. {{ $a->harga }} ,-</p>
            </div>
          </div>
      @endforeach
      Total Harga: {{$totals}}
      </div>
      
    </div>
  </div>
</div>
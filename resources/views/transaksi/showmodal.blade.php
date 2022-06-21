<div class="portlet">
  <div class="portlet-title">
    <b>Tampilan Transaksi dari: {{ $data->id }} - {{ $data->tanggal_transaksi}}</b>
  </div>
  <div class="portlet-body">
    <div class='row'>
      @foreach($data as $a)
        <div class="col-md-4">
          <div class="tumbnail">
            <div class="caption">
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
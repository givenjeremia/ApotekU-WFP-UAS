@extends('layouts.conquer2')

@section('title')
    Daftar Transaksi
@endsection

@section('content')

<div class="container">
  <h2>Daftar Transaksi</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Pembeli</th>
        <th>Tanggal Transaksi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $li)
      <tr>

      

        <td>{{$li -> id}}</td>
        <td>{{$li -> users_id}}</td>
        <td>{{$li -> tanggal_transaksi}}</td>
        
        <td>
          <a class="btn btn-default" data-toggle="modal" href="#basic" 
              onclick="getDetailData({{ $li->id }});">Lihat Rincian Pembelian</a>
        </td>

      </tr>
      @endforeach
      
    </tbody>
  </table>
  
</div>
<div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" >
            <div class="modal-header">
              <h4 class="Modal Title">Rincian</h4>
            </div>
            <div class="modal-body" id="gDD">
              
            </div>
            <div class="modal-footer">
              <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('js')
<script>
function getDetailData(id)
{
  $.ajax({
    type:'POST',
    url:'{{route("transaksi.showAjax")}}',
    data:'_token= <?php echo csrf_token() ?> &id='+id,
    success: function(data){
       $('#gDD').html(data.msg)
    }
  });
}
</script>
@endsection
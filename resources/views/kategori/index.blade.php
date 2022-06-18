@extends('layouts.conquer2')

@section('title')
Kategori
@endsection




@section('content')
<h1 class="text-center">List Kategori</h1>
<h3 class="text-center">Total {{ $jumlah }} Kategori</h3>
<a href="#modalCreate" data-toggle='modal' class='btn btn-info'>+Tambah</a><br><br>
<div class="table-responsive">
  <table id="myTable" class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>No</th>
        <th>Category Name</th>
        <th>Product List</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php
        $i=1
      @endphp
      @foreach ($data as $key => $item)
      <tr class="{{ ($key % 2 === 0) ? 'active' : 'success' }}">
        <td>{{ $i }}</td>
        <td>{{ $item->name}}</td>
        <td>
          {{-- <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal' onclick='showProducts({{ $item->id }})'>Show Product</a> --}}
          <ul>
              @foreach($item->obat as $value )
                <li>{{ $value->nama_obat }}</li>
              @endforeach
          </ul>
        </td>
        <td>
          <a href="#modalEdit" data-toggle='modal' class='btn btn-warning btn-xs' onclick="getEditForm({{$item->id}})">
            Edit
          </a>


          <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id='modalContent'></div>
            </div>
          </div>

          {{-- <a href="{{ route('kategori_obat.edit', $item->id) }}" class="btn btn-success">UPDATE</a>
          <form action="{{ route('kategori_obat.destroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">DELETE</button>
          </form> --}}
          kk
        </td>
      </tr>
      @php
        $i++
      @endphp
      @endforeach
    </tbody>
  </table>

  <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add New Category</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="{{url('kategori')}}">
          @csrf
            <div class="form-body">
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name">
              </div>
            </div>
            <div class="form-actions">
              <button type="submit" class="btn btn-info">Submit</button>
              <a href="{{url('kategori')}}" class="btn btn-default">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  
  <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" id="showproducts">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Detail Product</h4>
        </div>
        <div class="modal-body">
          <img src="{{ asset('conquer2/img/ajax-modal-loading.gif') }}" alt="">
            
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
     </div>
    </div>
  </div>
  
</div>
@endsection

@section('js')
<script>
    $('#myTable').DataTable();

    function getEditForm(id){
      $.ajax({
        type:'POST',
        url:'{{route("kategori.getEditForm")}}',
        data:{'_token':'<?php echo csrf_token() ?>',
              'id':id
            },
        success: function(data){
          $('#modalContent').html(data.msg)
        }
      });
    }
</script>
@endsection

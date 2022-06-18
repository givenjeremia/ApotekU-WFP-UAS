@extends('layouts.conquer2')

@section('title')
Kategori
@endsection


@section('content')
<h1 class="text-center">List Kategori</h1>
<h3 class="text-center">Total {{ $jumlah }} Kategori</h3>
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

</script>
@endsection

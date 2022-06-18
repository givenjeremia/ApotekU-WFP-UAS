@extends('layouts.conquer2')

@section('title')
Product
@endsection




@section('content')
<br>

<h4 class="text-center">Obat List</h4>
<a href="#modalCreate" data-toggle='modal' class='btn btn-info'> Tambah Obat </a><br><br>
<div class="table-responsive">
  <table id="myTable" class="table ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Obat</th>
        <th>Kategori</th>
        <th>Form</th>
        <th>Resiction Formula</th>
        <th>Deskripsi</th>
        <th>Faskes 1</th>
        <th>Faskes 2</th>
        <th>Faskes 3</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $key => $item)
      <tr class="{{ ($key % 2 === 0) ? 'active' : 'success' }}">
        <td scope="row">{{ $item->id }}</td>
        <td>
          <a class="btn btn-default edittable" data-toggle="modal" href="#detail_{{$item->id}}">
            {{ $item->nama_obat }}
          </a>
          <div class="modal fade" id="detail_{{$item->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{$item->nama_obat}}</h4>
                </div>
                <div class="modal-body">
                  <img src="{{ asset(($item->gambar == '') ? 'img/no_image.png' : 'img/'.$item->gambar ) }}"
                    height='200px' />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>{{ $item->kategori->name }}</td>
        <td>{{ $item->formula }}</td>
        <td>{{ $item->restriction_formula }}</td>
        <td>{{ $item->deskripsi }}</td>
        <td>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            @if ($item->faskes_tk1==1)
            <path
              d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
            @endif
          </svg>
        </td>
        <td>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            @if ($item->faskes_tk2==1)
            <path
              d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
            @endif
          </svg>
        </td>
        <td>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg"
            viewBox="0 0 16 16">
            @if ($item->faskes_tk3==1)
            <path
              d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
            @endif
          </svg>
        </td>
        <td>{{ number_format($item->harga, 2) }}</td>
        <td>
          <a class='btn btn-info' data-target="#show{{$item->id}}" data-toggle='modal'>
            Detail
          </a>
          <a  href="#modalEdit" data-toggle="modal"  class='btn btn-warning btn-xs' onclick="getEditForm( {{$item->id}} )">
            Edit
          </a>

          <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id='modalContent'></div>
              
            </div>
          </div>

          <div class="modal fade" id="show{{$item->id}}" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <!-- put animated gif here -->
                {{-- <img class="loading" src="{{ asset('assets/img/ajax-modal-loading.gif') }}" alt=""> --}}
              </div>
            </div>
          </div>
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>

</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Tambah Obat</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="{{url('obat')}}">
        @csrf
          <div class="form-body">
            <div class="form-group">
              <label>Nama Obat</label>
              <input type="text" class="form-control" id="name" name="name"><br>
              <label for="formula">Formula</label>
              <input type="text" class="form-control" id="formula" placeholder="Enter text" name="formula"><br>
              <label for="restriction">restriction formula</label>
              <input type="text" class="form-control" id="restriction" placeholder="Enter text" name="restriction"><br>
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" id="deskripsi" placeholder="Enter text" name="deskripsi"><br>
              <label for="faskes1">Faskes_tk1</label>
              <input type="text" class="form-control" id="faskes1" placeholder="Enter text" name="faskes1"><br>
              <label for="faskes2">Faskes_tk2</label>
              <input type="text" class="form-control" id="faskes2" placeholder="Enter text" name="faskes2"><br>
              <label for="faskes3">Faskes_tk3</label>
              <input type="text" class="form-control" id="faskes3" placeholder="Enter text" name="faskes3"><br>
              <label for="kategori">Kategori_ID</label>
              <select id="kategori_id" name="kategori_id">
                <option value="">--Select One--</option>
                @foreach ($kategori as $kat)
                  <option value="{{$kat->id}}">{{$kat->name}}</option>
                @endforeach                  
              </select><br>
              <label for="harga">Harga</label>
              <input type="text" class="form-control" id="harga" placeholder="Harga" name="harga"><br>
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control" id="gambar"  name="gambar"><br>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{url('obat')}}" class="btn btn-default">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="modalContent">

    </div>
  </div>
</div> -->


@endsection

@section('js')

<script>
    $('#myTable').DataTable();

  function getEditForm(id){
    $.ajax({
      type:'POST',
      url:'{{ route("obat.getEditForm")}}',
      data:{'_token':'<?php echo csrf_token() ?>',
            'id':id
          },
      success: function(data){
        // alert(data.msg);
        $('#modalContent').html(data.msg)
      }
    });
  }


</script>

@endsection


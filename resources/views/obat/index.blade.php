@extends('layouts.conquer2')

@section('title')
Product
@endsection



@section('content')
<br>

<h4 class="text-center">Obat List</h4>
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


@endsection

@section('js')

<script>
    $('#myTable').DataTable();
</script>

@endsection


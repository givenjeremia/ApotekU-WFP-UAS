@extends('layouts.conquer2')

@section('title')
Product
@endsection

@section('content')

<div class="container">
  <h2>Daftar Obat Terlaris</h2>
  <br>       
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Obat</th>
        <th>Banyak Obat yang</th>
      </tr>
    </thead>
    <tbody>
        @for ($i = 1; $i < 6; $i++)
      <tr>

        <td>{{ $arr[$i]['obat']->id }}</td>
        <td>{{ $arr[$i]['obat']->nama_obat }} ({{ $arr[$i]['obat']->formula }})</td>
        <td>{{ $arr[$i]['kuantitas'] }}</td>
        

      </tr>
      @endfor
      
    </tbody>
  </table>
  
</div>
@endsection
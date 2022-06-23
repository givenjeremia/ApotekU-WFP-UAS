@extends('layouts.conquer2')

@section('title')
Product
@endsection

@section('content')

<div class="container">
  <h2>Daftar Customer Terloyal</h2>
  <br>       
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID User</th>
        <th>Nama Customer</th>
        <th>Total Harga</th>
      </tr>
    </thead>
    <tbody>
        @foreach($arr as $array)
      <tr>
        @if($loop -> iteration >= 4)
        @break
        @endif
        <td>{{ $array['user']->id }}</td>
        <td>{{ $array['user']->name }}</td>
        <td>{{ $array['total'] }}</td>
        

      </tr>
      @endforeach
      
    </tbody>
  </table>
  
</div>
@endsection
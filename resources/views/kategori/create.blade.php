@extends('layouts.conquer2')

@section('title')
    Kategori Baru
@endsection

@section('content')
<div class="container">
  <h2>Tambah Kategori</h2>
  <form method="POST" action="{{ route('kategori.store') }}">
    @csrf
    <div class="form-group">
      <label for="name">Nama Kategori</label>
      <input type="name" class="form-control" id="name" placeholder="Enter text" name="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection

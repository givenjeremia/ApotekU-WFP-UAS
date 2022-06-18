@extends('layouts.conquer2')

@section('title')
    Obat Baru
@endsection

@section('content')
<div class="container">
  <h2>Tambah Obat</h2>
  <form method="POST" action="{{ route('obat.store') }}">
    @csrf
    <div class="form-group">
      
      <label for="name">Nama Obat</label>
      <input type="name" class="form-control" id="name" placeholder="Enter text" name="name"><br>
      <label for="formula">Formula</label>
      <input type="name" class="form-control" id="formula" placeholder="Enter text" name="formula"><br>
      <label for="restriction">restriction formula</label>
      <input type="name" class="form-control" id="restriction" placeholder="Enter text" name="restriction"><br>
      <label for="deskripsi">Deskripsi</label>
      <input type="text" class="form-control" id="deskripsi" placeholder="Enter text" name="deskripsi"><br>
      <label for="faskes1">Faskes_tk1</label>
      <input type="name" class="form-control" id="fakes1" placeholder="Enter text" name="faskes1"><br>
      <label for="faskes2">Faskes_tk2</label>
      <input type="name" class="form-control" id="fakes2" placeholder="Enter text" name="faskes2"><br>
      <label for="faskes3">Faskes_tk3</label>
      <input type="name" class="form-control" id="fakes3" placeholder="Enter text" name="faskes3"><br>
      <label for="kategori">Kategori_ID</label>
      <select id="kategori_id" name="kategori_id">
        <option value=""></option>
        <option value=""></option>
        <option value=""></option>
      </select>
      <label for="gambar">Gambar</label>
      <input type="file" class="form-control" id="gambar"  name="gambar"><br>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection
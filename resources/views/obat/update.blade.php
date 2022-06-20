<h2>Edit Obat</h2> <br>
<form role="form" method="POST" action="{{url('obat/'.$data->id)}}">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Obat</h4>
  </div>
  @csrf
  @method('PUT')
  <div class="modal-body">
    <div class="form-body">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" id="nama_obat" name='nama_obat' value="{{$data->nama_obat}}">
      </div>

      <div class="form-group">
        <label>Formula</label>
        <input type="text" class="form-control" id="formula" name='formula' value='{{$data->formula}}'>
      </div> 

      <div class="form-group">
        <label>Restriction Formula</label>
        <input type="text" class="form-control" id="restriction_formula" name='restriction_formula' value='{{$data->restriction_formula}}'>
      </div>

      <div class="form-group">
        <label>Harga</label>
        <input type="text" class="form-control" id="harga" name='harga' value='{{$data->harga}}'>
      </div>
 
      
      <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi">{{$data->deskripsi}}</textarea>
      </div>
      <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-4">Faskes TK1 </label>
                            <input type="checkbox" name="faskes_tk1" id="faskes_tk1" class="form-control" {{ ($data->faskes_tk1 == 1) ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-4">Faskes TK2 </label>
                            <input type="checkbox" name="faskes_tk2" id="faskes_tk2" class="form-control" {{ ($data->faskes_tk2 == 1) ? 'checked' : ''}}>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label col-md-4">Faskes TK3</label>
                            <input type="checkbox" name="faskes_tk3" id="faskes_tk3" class="form-control" {{ ($data->faskes_tk3 == 1) ? 'checked' : ''}}>
                        </div>
                    </div>
                </div>

      <div class="form-group">

        <label for="kategori">Kategori ID</label>
          <select class="form-control" name="kategori_id" id="kategori_id">
          @foreach ($kategori as $kat)
              <option value="{{ $kat->id }}" {{ $kat->id == $data->kategori_id ? 'selected' : ''}}>{{ $kat->name }}</option>
          @endforeach
          </select>
      </div>


    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>






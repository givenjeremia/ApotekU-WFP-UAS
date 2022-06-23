
<form role="form" method="POST" action="{{ route('kategori.update', $data->id) }}">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Edit Kategori</h4>
  </div>
  <div class="modal-body">
    @csrf
    @method('PUT')
    <div class="form-body">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" id="name" name='name' value="{{$data->name}}">
      </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-info">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
  </div>
</form>





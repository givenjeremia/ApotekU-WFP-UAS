@extends('layouts.frontend')

@section('title', 'ApotekU')




@section('content')

<div class="input-group">
    <input class="form-control border-end-0 border rounded-pill m-2" type="text"
        placeholder="Cari Obat Dengan Nama .." id="example-search-input">
</div>
<br>
<p id="query"></p>
<div class="container products">
    <div id="divrow">
        @include('frontend.page')
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $("#example-search-input").keyup(function() {
        $.ajax({
            type:'GET',
            url:'{{route("obat.cari")}}',
            data:'_token= <?php echo csrf_token() ?> &cari='+this.value,
            success: function(data){
                $('#load').html(data)
            }
        });
    });
    $(function () {
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 10000;" src="https://i.imgur.com/v3KWF05.gif />');
            var url = $(this).attr('href');
            window.history.pushState("", "", url);
            loadPosts(url);
        });
        function loadPosts(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('#divrow').html("");
                $('#divrow').html(data);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    });
</script>
@endsection
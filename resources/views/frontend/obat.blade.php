@extends('layouts.frontend')

@section('title', 'Products')




@section('content')
    <div class="container products">
        <div id="divrow">
            @include('frontend.page')
        
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
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



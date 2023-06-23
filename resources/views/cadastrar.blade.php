@extends('.layouts.main')


@section('content')

<p id="i">{{$i}}</p>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        i = $("#i").html();
        redirecionar(i);
    });

    function redirecionar(i){
        window.location.href = '/cadastrar/'+i;
    }
</script>
@endsection
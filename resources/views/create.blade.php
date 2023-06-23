@extends('.layouts.main')

@section('content')

<div class="mobile">
    <h5>Digite a combinação a ser excluída das sujestões <br>     <small class="text-center">(no momento você tem {{$quant}} de combinações cadastradas) </small></h5> 

    <form action="/cadastrar" method="post">
        @csrf
    <div class="inputs">
        <div class="">
            <input type="number" name="input1" maxlength="2" required id="1">
        </div>
        <div class="">
            <input type="number" name="input2" maxlength="2" required id="2">
        </div>
        <div class="">
            <input type="number" name="input3" maxlength="2" required id="3">
        </div>
        <div class="">
            <input type="number" name="input4" maxlength="2" required id="4">
        </div>
        <div class="">
            <input type="number" name="input5" maxlength="2" required id="5">
        </div>
        <div class="">
            <input type="number" name="input6" maxlength="2" required id="6">
        </div>
        <div class="">
            <input type="number" name="input7" maxlength="2" required id="7">
        </div>
        <div class="">
            <input type="number" name="input8" maxlength="2" required id="8">
        </div>
        <div class="">
            <input type="number" name="input9" maxlength="2" required id="9">
        </div>
        <div class="">
            <input type="number" name="input10" maxlength="2" required id="10">
        </div>
        <div class="">
            <input type="number" name="input11" maxlength="2" required id="11">
        </div>
        <div class="">
            <input type="number" name="input12" maxlength="2" required id="12">
        </div>
        <div class="">
            <input type="number" name="input13" maxlength="2" required id="13">
        </div>
        <div class="">
            <input type="number" name="input14" maxlength="2" id="14" required>
        </div>
        <div class="">
            <input type="number" name="input15" maxlength="2" id="15" required>
        </div>
        <br>
        <div class="btns">
        <a href="/" class="btn btn-sm btn-outline-danger" >Voltar</a>
        <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
  
        </div>
    </div>

    
</form>

    
   
</div>

@endsection

@section('script')
<script>
    for (var i = 1; i <= 15; i++) {
        var input = document.getElementById(i);
        input.addEventListener("keyup", function(e){
            if (e.target.value.length == 2) {
                var nextInput = document.getElementById((e.target.id.match(/\d+/)[0]*1 + 1));
                nextInput.focus();
            }
        });
    }
</script>
@endsection
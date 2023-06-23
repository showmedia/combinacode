@extends('.layouts.main')

@section('content')

<div class="mobile">
    <form action="/user/password" method="post">
        @csrf 
        @method('put')    
    <div class="formulario">
    <div class="mb-3">
        <label for="password_atual" class="form-label">Senha Atual</label>
        <input type="password" name="password_atual" required class="form-control" id="password_atual" placeholder="Digite sua senha atual">
    </div>
    <hr>

    <div class="mb-3">
        <label for="password" class="form-label">Senha Nova</label>
        <input type="password" name="password" required class="form-control" id="password" placeholder="Digite a senha nova">
    </div>
    <div class="mb-3">Confirme a senha</label>
        <input type="password" name="confirm_password" required class="form-control" id="confirm_password" placeholder="Confirme sua senha">
    </div>
    <button type="submit" class="btn btn-primary">Alterar</button>
    </div>
</form>
</div>

@endsection
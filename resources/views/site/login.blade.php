@extends('site.partials.head')
@section('title', $title)
@section('content')
@include('site.partials.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Login</h1>
    </div>

    <div class="informacao-pagina">
        Acesse o sistema
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="{{route('site.login.store')}}" method="POST">
                @csrf
                <input type="text" placeholder="E-mail" name="email" value='{{old('email')}}' class="borda-preta">
                {{$errors->has('email') ? $errors->first('email') : ''}}
                <input type="password" placeholder="Senha" name="password" value='{{old(key: 'password')}}' class="borda-preta">
                {{$errors->has('password') ? $errors->first('password') : ''}}
                <button type="submit">Fazer Login</button>
            </form>
        </div>
    </div>
</div>

<div class="rodape">
    <div class="redes-sociais">
        <h2>Redes sociais</h2>
        <img src="img/facebook.png">
        <img src="img/linkedin.png">
        <img src="img/youtube.png">
    </div>
    <div class="area-contato">
        <h2>Contato</h2>
        <span>(11) 3333-4444</span>
        <br>
        <span>supergestao@dominio.com.br</span>
    </div>
    <div class="localizacao">
        <h2>Localização</h2>
        <img src="img/mapa.png">
    </div>
</div>
@endsection
@extends('app.partials.head')
@section('title', $title)
@section('content')
@include('app.partials.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Adicionar fornecedor</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="">Novo</a>
            </li>
            <li>
                <a href="">Consulta</a>
            </li>
        </ul>
    </div>
    
    <div class="informacao-pagina">
        {{$message}}
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action="{{route("app.fornecedores.add")}}" method="POST">
                @csrf
                <input type="text" name="name" class="borda-preta" placeholder="Nome" value="{{old('name')}}">
                {{$errors->has('name') ? $errors->first(): '' }}
                <input type="text" name="site" class="borda-preta" placeholder="Site" value="{{old('site')}}">
                {{$errors->has('site') ? $errors->first(): '' }}
                <input type="text" name="country" class="borda-preta" placeholder="Pais de origem" value="{{old('country')}}">
                {{$errors->has('country') ? $errors->first(): '' }}
                <input type="text" name="email" class="borda-preta" placeholder="E-mail" value="{{old('email')}}">
                {{$errors->has('email') ? $errors->first(): '' }}
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection
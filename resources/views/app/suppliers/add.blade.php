@extends('app.partials.head')
@section('title', $title ?? 'NexGestao |')
@section('content')
@include('app.partials.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Adicionar fornecedor</p>
    </div>
    
    <div class="informacao-pagina">
        {{$message ?? ''}}
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action="{{route("app.fornecedores.add")}}" method="POST">
                <input type="hidden" name="id" value="{{$supplier->id ?? ''}}">
                @csrf
                <input type="text" name="name" class="borda-preta" placeholder="Nome" value="{{$supplier->name ?? old('name')}}">
                {{$errors->has('name') ? $errors->first(): '' }}
                <input type="text" name="site" class="borda-preta" placeholder="Site" value="{{$supplier->site ?? old('site')}}">
                {{$errors->has('site') ? $errors->first(): '' }}
                <input type="text" name="country" class="borda-preta" placeholder="Pais de origem" value="{{$supplier->country ?? old('country')}}">
                {{$errors->has('country') ? $errors->first(): '' }}
                <input type="text" name="email" class="borda-preta" placeholder="E-mail" value="{{$supplier->email ?? old('email')}}">
                {{$errors->has('email') ? $errors->first(): '' }}
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection
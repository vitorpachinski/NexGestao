@extends('app.partials.head')
@section('title', $title)
@section('content')
@include('app.partials.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Fornecedores</p>
    </div>
    <div class="informacao-pagina">
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action="{{route('app.fornecedores.list')}}" method="POST">
                @csrf
                <input type="text" name="name" class="borda-preta" placeholder="Nome">
                <input type="text" name="site" class="borda-preta" placeholder="Site">
                <input type="text" name="country" class="borda-preta" placeholder="Pais de origem">
                <input type="text" name="email" class="borda-preta" placeholder="E-mail">
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection
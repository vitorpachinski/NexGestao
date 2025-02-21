@extends('app.partials.head')
@section('title', $title ?? 'NexGestao |')
@section('content')
@include('app.partials.products.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Criar detalhe de produto</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('productDetails.create')}}">Novo</a>
            </li>
            <li>
                {{-- <a href="{{route('app.fornecedores')}}">Consulta</a> --}}
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{$message ?? ''}}
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            @component('app.product_detail._components.form', ['units' => $units])
                
            @endcomponent
        </div>
    </div>
</div>
@endsection
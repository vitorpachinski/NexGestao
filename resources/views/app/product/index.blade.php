@extends('app.partials.head')
@section('title', $title ?? '')
@section('content')
@include('app.partials.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Listar</p>
    </div>
    <div class="informacao-pagina">
        <div style="width:90%; margin-left: auto; margin-right: auto;">
            <table border="1" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>EXCLUIR</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{isset($product->site) ? $product->site : 'Site do fornecedor não informado'}}</td>
                            <td>{{$product->country}}</td>
                            <td>{{$product->email}}</td>
                            <td><a href="{{route('app.products.remove', $product->id)}}">EXCLUIR</a></td>
                            <td><a href="{{route('app.products.edit', $product->id)}}">EDITAR</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
                {{$products->appends($request)->links()}}
                {{$products->total()}} Registros encontrados
        </div>
    </div>
</div>
@endsection
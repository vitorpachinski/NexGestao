@extends('app.partials.head')
@section('title', $title ?? '')
@section('content')
@include('app.partials.products.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Listar</p>
    </div>
    <ul>
        <li>
            <a href="{{route('products.create')}}">Novo</a>
        </li>
        <li>
            {{-- <a href="{{route('app.fornecedores')}}">Consulta</a> --}}
        </li>
    </ul>
    <div class="informacao-pagina">
        <div style="width:90%; margin-left: auto; margin-right: auto;">
            <table border="1" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th>VISUALIZAR</th>
                        <th>EXCLUIR</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{isset($product->site) ? $product->site : 'Site do fornecedor não informado'}}</td>
                            <td>{{$product->weight}}</td>
                            <td>{{$product->unit_id}}</td>
                            <td><a href="{{route('products.show',['product' => $product->id])}}">VISUALIZAR</a></td>
                            {{-- <td><a href="{{route('', $product->id)}}">EXCLUIR</a></td> --}}
                            {{-- <td><a href="{{route('products.update',[ $product->id, $units])}}">EDITAR</a></td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
                {{-- {{$products->appends($request)->links()}} --}}
                {{$products->total()}} Registros encontrados
        </div>
    </div>
</div>
@endsection
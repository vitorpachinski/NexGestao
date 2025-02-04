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
                        <th>Site</th>
                        <th>País de Origem</th>
                        <th>E-mail</th>
                        <th>EXCLUIR</th>
                        <th>EDITAR</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{isset($supplier->site) ? $supplier->site : 'Site do fornecedor não informado'}}</td>
                            <td>{{$supplier->country}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>EXCLUIR</td>
                            <td><a href="{{route('app.fornecedores.edit', $supplier->id)}}">EDITAR</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
                {{$suppliers->appends($request)->links()}}
        </div>
    </div>
</div>
@endsection
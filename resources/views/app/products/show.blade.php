@extends('app.partials.head')
@section('title', $title ?? '')
@section('content')
    @include('app.partials.products.header')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-fornecedor">
            <p>VISUALIZAR PRODUTO</p>
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
                            <th>ID:</th>
                            <th>Nome</th>
                            <th>Descricao</th>
                            <th>Peso</th>
                            <th>Unidade de Medida</th>
                            <th>EXCLUIR</th>
                            <th>EDITAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{isset($product->site) ? $product->site : 'Site do fornecedor não informado'}}</td>
                            <td>{{$product->weight}}</td>
                            <td>{{$product->unit_id}}</td>
                            <td>
                                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST"
                                    id="form">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="sendForm()">EXCLUIR</a>
                                </form>
                            </td>
                            <td><a href="{{route('products.edit', ['product' => $product->id])}}">EDITAR</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    function sendForm() {
        document.getElementById('form').submit();
    }
</script>
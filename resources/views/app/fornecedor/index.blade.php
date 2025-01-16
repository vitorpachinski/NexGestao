<h1>Cadastrar Fornecedor</h1>
<div>
    <form action="{{route('app.fornecedores.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome do fornecedor">
        <input type="phone" name="phone" placeholder="Telefone do fornecedor">
        <input type="submit" value="Inserir">
    </form>
    <h3>Lista de fornecedores </h3>
    <ul>
        @isset($fornecedores)
        @foreach ($fornecedores as $fornecedor):
            <li>{{$fornecedor['name']}}</li>
            <li>{{$fornecedor['phone']}}</li>
        @endforeach
        @endisset
    </ul>
</div>
@php


@endphp
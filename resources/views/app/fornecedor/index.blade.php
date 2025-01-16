<h1>Cadastrar Fornecedor</h1>
<div>
    <form action="{{route('app.fornecedores.store')}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome do fornecedor" required>
        <input type="number" name="phone" placeholder="Telefone do fornecedor" required>
        <input type="number" name="CNPJ" placeholder="CNPJ">
        <input type="submit" value="Inserir">
    </form>
    <h3>Lista de fornecedores </h3>
    <ul>
        <h2>{{$message}}</h2>
        @isset($fornecedores)
        @foreach ($fornecedores as $i=>$fornecedor)
            <li>{{$i+1}}º FORNECEDOR</li>
            <li>NOME: {{$fornecedor['name']}}</li>
            <li>TELEFONE: {{$fornecedor['phone']}}</li>
            <li>CNPJ: {{$fornecedor['CNPJ'] ?? 'CNPJ Nao informado'}}</li>
            <br>
        @endforeach
        @endisset
    </ul>
</div>
@php


@endphp
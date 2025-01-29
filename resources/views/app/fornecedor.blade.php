@extends('app.partials.head')
@section('title', $title)
@section('content')
@include('app.partials.header')

<h1>Cadastrar Fornecedor</h1>
<div>
    <form action="" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Nome do fornecedor" required>
        <input type="number" name="phone" placeholder="Telefone do fornecedor" required>
        <input type="number" name="CNPJ" placeholder="CNPJ">
        <select name="country" id="country">
            <option value="">Selecione um país</option>
            <option value="Brazil">Brasil</option>
            <option value="USA">EUA</option>
            <option value="Paraguay">Paraguai</option>
            <option value="China">China</option>
        </select>
        <input type="submit" value="Inserir">
    </form>
    <h3>Lista de fornecedores </h3>
    <ul>
        <h2>{{$message}}</h2>
        @isset($fornecedores)
        @foreach ($fornecedores as $i=>$fornecedor)
        <li>Iteração atual {{$loop->iteration}}</li>
            <li>{{$i+1}}º FORNECEDOR</li>
            <li>NOME: {{$fornecedor['name']}}</li>
            <li>TELEFONE: {{$fornecedor['phone']}}</li>
            <li>CNPJ: {{$fornecedor['CNPJ'] ?? 'CNPJ Nao informado'}}</li>
            <li>Pais de origem: {{$fornecedor['country']}}</li>
            @switch($fornecedor['country'])
                @case("Brazil")
                    Fornecedor nacional, imposto medio calculado de 19% ICMS. Produto com NF-e
                    @break
                @case("USA")
                    Fornecedor internacional, origem estadunidense, imposto medio calculado de 32%. Produto com NF-e
                    @break
                @case("Paraguay")
                    Fornecedor internacional, origem paraguaia, imposto medio calculado de 0%. Produto sem NF-e
                    @break
                @case("China")
                    Fornecedor internacional, origem chinesa, imposto medio calculado de 13% + 19% ICMS. Produto sem NF-e
                    @break
                @default
                    Fornecedor de origem não identificada, imposto medio calculado de 19% ICMS. Produto sem NF-e
                    @break
            @endswitch
            <br>
        @endforeach
        @endisset
    </ul>
</div>
@endsection
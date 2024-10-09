<h1>Cadastrar Fornecedor</h1>
<div>
    <form action="" method="GET">
        <input type="text" name="nome" placeholder="Nome do fornecedor">
        <input type="number" name="phone" placeholder="Telefone do fornecedor">
        <input type="submit" value="Inserir">
    </form>
    <h3>Lista de fornecedores </h3>
    <ul>
    <h2>{{$existe}}</h2>
    @php
        foreach ($fornecedores as $fornecedor):
    @endphp
    <li>{{$fornecedor}}</li>
    @php
        endforeach
    @endphp
    </ul>
</div>
@php


@endphp

@dd($fornecedores)
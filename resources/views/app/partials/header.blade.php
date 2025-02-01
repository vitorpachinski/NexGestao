<div class="topo">

    <div class="logo">
        <img src="{{asset('img/logo.png')}}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{route('app.home')}}">Home</a></li>
            <li><a href="{{route('app.clientes')}}">Clientes</a></li>
            <li><a href="{{route('app.produtos')}}">Produtos</a></li>
            <li><a href="{{route('app.fornecedores')}}">Fornecedores</a></li>
            <li><a href="{{route('app.logout')}}">Sair</a></li>
        </ul>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('app.fornecedores.new')}}">Novo</a>
            </li>
            <li>
                <a href="{{route('app.fornecedores')}}">Consulta</a>
            </li>
        </ul>
    </div>
</div>
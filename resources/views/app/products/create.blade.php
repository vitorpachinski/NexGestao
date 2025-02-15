@extends('app.partials.head')
@section('title', $title ?? 'NexGestao |')
@section('content')
@include('app.partials.products.header')

<div class="conteudo-pagina">
    <div class="titulo-pagina-fornecedor">
        <p>Criar produto</p>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a href="{{route('app.products.create')}}">Novo</a>
            </li>
            <li>
                {{-- <a href="{{route('app.fornecedores')}}">Consulta</a> --}}
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{$message ?? ''}}
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action="{{route("app.product.create")}}" method="POST">
                {{-- <input type="hidden" name="id" value="{{$supplier->id ?? ''}}"> --}}
                @csrf
                <input type="text" name="name" class="borda-preta" placeholder="Nome" value="{{old('name')}}">
                {{$errors->has('name') ? $errors->first() : '' }}
                <input type="text" name="description" class="borda-preta" placeholder="Site"
                    value="{{old('description')}}">
                {{$errors->has('description') ? $errors->first() : '' }}
                <input type="text" name="weight" class="borda-preta" placeholder="Pais de origem"
                    value="{{old('weight')}}">
                {{$errors->has('weight') ? $errors->first() : '' }}
                <select name="unit">
                    @foreach ($unitys as $unity)
                        <option value="{{$unity->id}}">{{$unity->description}}</option>
                    @endforeach

                </select>
                {{$errors->has('email') ? $errors->first() : '' }}
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
    </div>
</div>
@endsection
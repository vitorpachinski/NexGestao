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
                <a href="{{route('products.create')}}">Novo</a>
            </li>
            <li>
                {{-- <a href="{{route('app.fornecedores')}}">Consulta</a> --}}
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        {{$message ?? ''}}
        <div style="width:30%; margin-left: auto; margin-right: auto;">
            <form action="{{route("products.store")}}" method="POST">
                {{-- <input type="hidden" name="id" value="{{$supplier->id ?? ''}}"> --}}
                @csrf
                <input type="text" name="name" class="borda-preta" placeholder="Nome" value="{{old('name')}}">
                {{$errors->has('name') ? $errors->first('name') : '' }}
                <input type="text" name="description" class="borda-preta" placeholder="Descrição"
                    value="{{old('description')}}">
                {{$errors->has('description') ? $errors->first('description') : '' }}
                <input type="number" name="weight" class="borda-preta" placeholder="Peso"
                    value="{{old('weight')}}">
                {{$errors->has('weight') ? $errors->first('weight') : '' }}
                <select name="unit_id">
                    @foreach ($units as $unit)
                        <option value="{{$unit->id}}" {{old('unit_id') == $unit->id ? "selected" : ''}}>{{$unit->description}}</option>
                    @endforeach
                </select>
                {{$errors->has('unit_id') ? $errors->first('unit_id') : '' }}
                <button type="submit" class="borda-preta">Criar Produto</button>
            </form>
        </div>
    </div>
</div>
@endsection
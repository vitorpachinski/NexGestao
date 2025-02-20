@if (isset($product->id))
    <form action="{{route("products.update", ['product' => $product->id])}}" method="POST">
        @method("PUT")
@else
    <form action="{{route("products.store")}}" method="POST">
@endif
        {{-- <input type="hidden" name="id" value="{{$supplier->id ?? ''}}"> --}}
        @csrf
        <input type="text" name="name" class="borda-preta" placeholder="Nome"
            value=" {{$product->name ?? old('name')}}">
        {{$errors->has('name') ? $errors->first('name') : '' }}
        <input type="text" name="description" class="borda-preta" placeholder="Descrição"
            value="{{$product->description ?? old('description')}}">
        {{$errors->has('description') ? $errors->first('description') : '' }}
        <input type="number" name="weight" class="borda-preta" placeholder="Peso"
            value="{{$product->weight ?? old('weight')}}">
        {{$errors->has('weight') ? $errors->first('weight') : '' }}
        <select name="unit_id">
            @foreach ($units as $unit)
                <option value="{{$unit->id}}" {{old('unit_id') == $unit->id ? "selected" : ''}}>{{$unit->description}}
                </option>
            @endforeach
        </select>
        {{$errors->has('unit_id') ? $errors->first('unit_id') : '' }}
        @if (isset($product->id))
            <button type="submit" class="borda-preta">Editar Produto</button>
        @else
            <button type="submit" class="borda-preta">Criar Produto</button>
        @endif
    </form>
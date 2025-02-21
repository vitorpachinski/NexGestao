@if (isset($productDetail->id))
    <form action="{{route("productDetails.update", ['ProductDetail' => $productDetail->id])}}" method="POST">
        @method("PUT")
@else
    <form action="{{route("productDetails.store")}}" method="POST">
@endif
        {{-- <input type="hidden" name="id" value="{{$supplier->id ?? ''}}"> --}}
        @csrf
        <input type="number" name="product_id" class="borda-preta" placeholder="ID do produto"
            value=" {{$productDetail->product_id ?? old('product_id')}}">
        <input type="float" name="height" class="borda-preta" placeholder="Altura"
            value=" {{$productDetail->name ?? old('height')}}">
        {{$errors->has('height') ? $errors->first('height') : '' }}
        <input type="float" name="width" class="borda-preta" placeholder="Largura"
            value="{{$productDetail->width ?? old('width')}}">
        {{$errors->has('width') ? $errors->first('width') : '' }}
        <input type="float" name="length" class="borda-preta" placeholder="Comprimento"
            value="{{$productDetail->length ?? old('length')}}">
        {{$errors->has('length') ? $errors->first('length') : '' }}
        <select name="unit_id">
            @foreach ($units as $unit)
                <option value="{{$unit->id}}" {{old('unit_id') == $unit->id ? "selected" : ''}}>{{$unit->description}}
                </option>
            @endforeach
        </select>
        {{$errors->has('unit_id') ? $errors->first('unit_id') : '' }}
        @if (isset($productDetail->id))
            <button type="submit" class="borda-preta">Editar Produto</button>
        @else
            <button type="submit" class="borda-preta">Criar Produto</button>
        @endif
    </form>
{{$slot}}
<form action="{{route('site.contato.store')}}" method="POST">
    @csrf
    <input type="text" placeholder="Nome" name="name" value="{{old('name')}}" class="borda-preta">
    @if($errors->has('name'))
        <span class="error-message">{{$errors->first('name')}}</span>
    @endif
    <br>
    <input type="text" placeholder="Telefone" name="phone" value="{{old('phone')}}" class="borda-preta">
    @if($errors->has('phone'))
        <span class="error-message">{{$errors->first('phone')}}</span>
    @endif
    <br>
    <input type="text" placeholder="E-mail" name="email" value="{{old('email')}}" class="borda-preta">
    @if($errors->has('email'))
        <span class="error-message">{{$errors->first('email')}}</span>
    @endif
    <br>
    <select class="borda-preta" name="contact_reasons_id">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($contactReasons as $contactReason)
            <option value="{{$contactReason->id}}" {{old('reason') == $contactReason->id ? 'selected' : ''}}>
                {{$contactReason->contact_reason}}
            </option>
        @endforeach
        <!--<option value="1" {{old('reason') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('reason') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('reason') == 3 ? 'selected' : ''}}>Reclamação</option>-->
    </select>
    @if($errors->has('contact_reasons_id'))
        <span class="error-message">{{$errors->first('contact_reasons_id')}}</span>
    @endif
    <br>
    <textarea class="borda-preta"
        name="message"><?=old('message') != '' ? old('message') : 'Preencha aqui a sua mensagem'?></textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
<style>
    .error-message {
        color: red;
    }
    @media screen and (max-width: 600px) {
        .error-message {
            display: none;
        }
    }
</style>
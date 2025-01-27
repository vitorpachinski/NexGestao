{{$slot}}
<form action="{{route('site.contato.store')}}" method="POST">
    @csrf
    <input type="text" placeholder="Nome" name="name" value="{{old('name')}}" class="borda-preta" >
    <br>
    <input type="text" placeholder="Telefone" name="phone" value="{{old('phone')}}" class="borda-preta" >
    <br>
    <input type="text" placeholder="E-mail" name="email" value="{{old('email')}}" class="borda-preta" >
    <br>
    <select class="borda-preta" name="reason" >
        <option value="">Qual o motivo do contato?</option>
        @foreach ($contact_reasons as $key=>$contact_reason)
            <option value="{{$contact_reason->id}}" {{old('reason') == $key ? 'selected' : ''}}>{{$contact_reason->contact_reason}}</option>
        @endforeach
        <!--<option value="1" {{old('reason') == 1 ? 'selected' : ''}}>Dúvida</option>
        <option value="2" {{old('reason') == 2 ? 'selected' : ''}}>Elogio</option>
        <option value="3" {{old('reason') == 3 ? 'selected' : ''}}>Reclamação</option>-->
    </select>
    <br>
    <textarea class="borda-preta" name="message"><?=old('message') != '' ? old('message') : 'Preencha aqui a sua mensagem'?></textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
<div style="position:absolute; top:0px; left: 0px; width: 100%;background:red;">
    
</div>
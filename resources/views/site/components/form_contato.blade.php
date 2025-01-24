{{$slot}}
<form action="{{route('site.contato.store')}}" method="POST">
    @csrf
    <input type="text" placeholder="Nome" name="name"  class="borda-preta" >
    <br>
    <input type="text" placeholder="Telefone" name="phone" class="borda-preta" >
    <br>
    <input type="text" placeholder="E-mail" name="email" class="borda-preta" >
    <br>
    <select class="borda-preta" name="reason" >
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea class="borda-preta" name="message">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
<div style="position:absolute; top:0px; left: 0px; width: 100%;background:red;">
    <pre>
    {{ print_r($errors) }} 
</pre>
</div>
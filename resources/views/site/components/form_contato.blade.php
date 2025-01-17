{{$slot}}
<form action="{{route('site.contato.store')}}" method="POST">
    @csrf
    <input type="text" placeholder="Nome" name="name" class="borda-preta">
    <br>
    <input type="text" placeholder="Telefone" name="phone" class="borda-preta">
    <br>
    <input type="text" placeholder="E-mail" name="mail" class="borda-preta">
    <br>
    <select class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="doubt">Dúvida</option>
        <option value="praise">Elogio</option>
        <option value="complaint">Reclamação</option>
    </select>
    <br>
    <textarea class="borda-preta" name="message">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>
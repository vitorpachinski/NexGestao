<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
</head>
<body>
    <h1>Cadastrar Cliente</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('app.customers.store') }}" method="POST">
        @csrf

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        <br>

        <label for="whatsapp_number_1">WhatsApp 1:</label>
        <input type="text" id="whatsapp_number_1" name="whatsapp_number_1" value="{{ old('whatsapp_number_1') }}">
        <br>

        <label for="whatsapp_number_2">WhatsApp 2:</label>
        <input type="text" id="whatsapp_number_2" name="whatsapp_number_2" value="{{ old('whatsapp_number_2') }}">
        <br>

        <label for="phone_number_1">Telefone 1:</label>
        <input type="text" id="phone_number_1" name="phone_number_1" value="{{ old('phone_number_1') }}">
        <br>

        <label for="phone_number_2">Telefone 2:</label>
        <input type="text" id="phone_number_2" name="phone_number_2" value="{{ old('phone_number_2') }}">
        <br>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

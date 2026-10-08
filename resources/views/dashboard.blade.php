<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>

    <link rel="stylesheet" href= "{{ asset('css/style.css') }}">
</head>

<body>
    <div class="caixa-login">
    {{-- auth()->user() = o usuário que está logado nesta sessão --}}
    {{-- ->name = a coluna "name" dele na tabela users --}}

    <h1>Bem-vindo, {{ auth()->user()->name }}!</h1>

    <p>Esta página só aparece para quem fez login.</p>

    {{-- Logout é POST, então o botão precisa estar dentro de um formulário --}}
    {{-- route('logout') = "me dê o endereço da rota CHAMADA logout" --}}

        <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">Sair</button>
        </form>
    </div>
</body>
</html>
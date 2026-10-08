<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    {{-- <link> = liga um arquivo CSS a esta página --}}
    {{-- asset('css/style.css') = gera o endereço do arquivo dentro da pasta public --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    {{-- class="caixa-login" = o "nome" que o CSS vai usar para estilizar esta caixa --}} 
    <div class="caixa-login">
        <h1>Entrar no sistema</h1>

        {{-- ALTO-FALANTE: mostra os erros que o controller enviou --}}
       
    @if ($errors->any())
        {{-- class="erro" = o CSS vai pintar esta caixa de vermelho claro --}}
        <div class="erro">
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <!-- method="POST": vai ENVIAR dados -->
    <!-- action="/login": vai enviar para a rota /login -->
     <form method="POST" action="/login">
        <!-- O "lacre" de segurança. Todo formulário POST no Laravel precisa dele -->
         @csrf
        <!-- label = o texto que descreve o campo -->
        <!-- for="email" liga o label ao campo com id="email" -->
        <label for="email">E-mail</label>
        <!-- type="email": o navegador exige formato de e-mail -->
        <!-- name="email": o NOME com que o dado chega ao Laravel -->
        <!-- required: o campo é obrigatório -->
         <input type="email" id="email" name="email" value="{{old('email') }}" required>

      

         <label for="password">Senha</label>
         <!-- type="password": esconde o que é digitado com ●●●● -->
         <input type="password" id="password" name="password" required>

        <!-- type="submit": clicar neste botão ENVIA o formulário -->
         <button type="submit">Entrar</button>
     </form>
    </div>
</body>
</html>
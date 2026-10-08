<?php

namespace App\Http\Controllers;

// Request = tudo o que o navegador enviou (os campos do formulário, por exemplo)
use Illuminate\Http\Request;
// Auth = a ferramenta de autenticação (login/logout) do Laravel
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostra a tela de login (o formulário)
    public function index()
    {
        // Busca o arquivo resources/views/auth/login.blade.php
        return view('auth.login');
    }

    // POST /login: recebe o formulário e tenta fazer o login
    // (Request $request) = o Laravel entrega aqui os dados enviados
    public function login(Request $request) 
    {

    // ETAPA 1: VALIDAR
    // Se alguma regra falhar, o Laravel volta para o formulário sozinho
    $credenciais = $request->validate([
       'email' => ['required', 'email'],  // obrigatório e com formato de e-mail
       'password' => ['required'], // obrigatório
    ]);

    // ETAPA 2: TENTAR AUTENTICAR
    // Auth::attempt procura o e-mail na tabela users e confere a senha com o hash
    // Devolve true (deu certo) ou false (deu errado)
    if (Auth::attempt($credenciais)) {

        //Segurança: troca o id da sessão do login
        $request->session()->regenerate();

        // redirect()->intended() = "mande o usuário para a página que ele
        // TENTAVA acessar antes de ser barrado".
        // Se ele não tentou nenhuma, vai para '/dashboard'
        return redirect()->intended('dashboard');
    }
        // ETAPA 3b: DEU ERRADO
        // back() = volte para a página anterior (o formulário)
        // withErrors = leve junto uma mensagem de erro
        // onlyInput('email') = devolva o e-mail digitado, para não precisar redigitar
        return back()->withErrors([
        'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');

    }

    // POST /logout: tira o usuário da sessão
    public function logout(Request $request)
    {
       // Remove o usuário da sessão (o user_id deixa de apontar para ele)
       Auth::logout(); 

       // Invalida a sessão inteira: apaga os dados guardados nela
       $request->session()->invalidate();

       // Gera um novo "lacre" @csrf, para o antigo não servir mais
       $request->session()->regenerateToken();

       // Manda o visitante de volta para a tela de login
        return redirect('/login');

    }

    
}

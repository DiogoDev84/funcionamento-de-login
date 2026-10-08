<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OlaController extends Controller
{
    // Um "método" é uma função que pertence a uma classe.
    // O nome "index" é uma convenção para "a página principal "
    public function index(){
        // A mesma linha que estava na rota: agora ela mora aqui.
        return view('ola', ['nome' => 'João','sobrenome' => 'Silva']);
    }
}

<?php

namespace Database\Seeders;

// Importa a ferramenta que embaralha (gera o hash de) senhas
use Illuminate\Support\Facades\Hash;

// Importa o Model User (a "despensa" da tabela users)
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// Importa o trait que desliga os "avisos automáticos" dos Models
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // Usa o trait: enquanto este seeder roda, os avisos ficam desligados
    use WithoutModelEvents;

    // run() = "executar": o que o seeder faz quando é rodado
    public function run(): void
    {
       
    // User::create = insira uma linha na tabela users
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@email.com',

            // Hash::make embaralha a senha ANTES de salvar no banco
            'password' => Hash::make('12345678'),
        ]);
    }
}

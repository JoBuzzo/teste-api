<?php

namespace Database\Seeders;

use App\Models\Cotacao;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'nome' => 'Joao Lucas Buzzo',
            'login' => 'test@example.com',
            'senha' => '12345678',
        ])
        ->cotacoes()->createMany(
            Cotacao::factory(10)->make()->toArray()
        );


        Cotacao::factory(30)->create();
    }
}

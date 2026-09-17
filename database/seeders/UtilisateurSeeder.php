<?php

namespace Database\Seeders;

use App\Models\Utilisateur;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run(): void
    {
        Utilisateur::create([
            'nom' => 'Admin',
            'email' => 'admin@basket2ballers.fr',
            'mot_de_passe' => Hash::make('admin1234'),
            'is_admin' => true,
        ]);

        Utilisateur::create([
            'nom' => 'Client Test',
            'email' => 'client@basket2ballers.fr',
            'mot_de_passe' => Hash::make('client1234'),
            'is_admin' => false,
        ]);
    }
}

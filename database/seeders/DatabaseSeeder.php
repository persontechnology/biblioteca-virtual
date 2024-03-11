<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $cursos = array(
            'Octavo año de educación básica'=>'primary',
            'Noveno año de educación básica'=>'secondary',
            'Décimo año de educación básica'=>'danger',
            'Primer año de bachillerato'=>'success',
            'Segundo año de bachillerato'=>'warning',
            'Tercer año de bachillerato'=>'dark',
        );

        foreach ($cursos as $key => $value) {
            Curso::firstOrCreate(
                ['nombre' => $key,'color'=>$value]
            );
        }
        

        $email_docente="docente@gmail.com";
        $user = User::firstOrCreate(
            ['name' => 'Docente'],
            [
                'email' => $email_docente,
                'password' => Hash::make($email_docente),
                'perfil'=>'DOCENTE'
            ]
        );

    }
}

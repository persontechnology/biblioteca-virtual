<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
use Illuminate\Database\Seeder;

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
        
    }
}

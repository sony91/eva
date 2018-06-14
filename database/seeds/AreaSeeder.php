<?php

use Illuminate\Database\Seeder;
use Cinema\Area;
class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'nameare'=>'Base de Datos',
        ]);
        Area::create([
            'nameare'=>'Redes',
        ]);
        Area::create([
            
            'nameare'=>'Ingenieria de Software',
        ]);

        Area::create([
            'nameare'=>'Inteligencia Artificial',
        ]);

        Area::create([
            'nameare'=>'Programacion Web',
        ]);



        Area::create([
            'nameare'=>'Test Unit Base de Datos',
            'area_id'=>1
        ]);
        Area::create([
            'nameare'=>'Data population',
            'area_id'=>1

        ]);

        Area::create([
            'nameare'=>'Telecomunicaciones',
            'area_id'=>2
        ]);
        Area::create([
            'nameare'=>'Seguridad de redes',
            'area_id'=>2

        ]);

        Area::create([
            'nameare'=>'Sistemas Informacion I',
            'area_id'=>3
        ]);
        Area::create([
            'nameare'=>'Sistemas Informacion II',
            'area_id'=>3

        ]);
        Area::create([
            'nameare'=>'Machine Learnig',
            'area_id'=>4

        ]);
        Area::create([
            'nameare'=>'Comunicacion Entre Agentes',
            'area_id'=>4

        ]);
        Area::create([
            'nameare'=>'Programacion Movil',
            'area_id'=>5
        ]);
        Area::create([
            'nameare'=>'Video Juegos',
            'area_id'=>5
        ]);
    }
}

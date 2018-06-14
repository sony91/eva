<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(GestionSeeder::class);
        Model::reguard();
    }
}

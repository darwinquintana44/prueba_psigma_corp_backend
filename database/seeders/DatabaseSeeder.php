<?php

namespace Database\Seeders;

use App\Models\Globales\GlobalTrMunicipios;
use App\Models\Globales\GlobalTrPaises;
use App\Models\Globales\GlobalTrDepartamentos;
use App\Models\Transportes\TransporteTrSupervisores;
use App\Models\Transportes\TransporteTmVehiculos;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseSeeder extends Seeder
{
    use RefreshDatabase;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // creamos datos ficticios de cada una de las tablas que necesitamos llenar de manera automatica
        GlobalTrPaises::factory(2)
            ->has(GlobalTrDepartamentos::factory()
                ->has(GlobalTrMunicipios::factory()
                    ->has(TransporteTrSupervisores::factory()
                        ->count(2)
                    )->count(5)
                )->count(3)
            )->create();

        // creamos datos de prueba de los vehiculos
        TransporteTmVehiculos::factory()->count(10)->create();
    }
}

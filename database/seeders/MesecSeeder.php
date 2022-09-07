<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meseci = ["Januar", "Februar", "Mart", "April", "Maj", "Jun", "Jul", "Avgust", "Septembar", "Oktobar", "Novembar", "Decembar"];
        foreach ($meseci as $mesec) {
            DB::table('meseci')->insert([[
                "mesec" => $mesec
            ]]);
        }

        for ($i = 2020; $i <= 2030; $i++) {
            DB::table("godine")->insert([
                "godina" => $i
            ]);
        }
    }
}

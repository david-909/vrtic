<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SamoDecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $imenaDece = ["Marko", "Milos", "David", "Djordje", "Matija", "Filip", "Nikola", "Stefan", "Katarina", "Marija", "Ana", "Mila"];
        $prezimenaDece = ["Markovic", "Lukic", "Sofronijevic", "Kostic", "Davidovic", "Petrovic", "Jovanovic", "Lukic", "Teodorovic", "Trickovic", "Radosavljevic", "Nikolic"];
        $imenaRoditelja = ["Dragan", "Zoran", "Slobodan", "Jovan", "Lenka", "Milos", "Maksim", "Aleksandar", "Sasa", "Marina", "Bojan", "Svetlana"];

        for ($i = 0; $i < count($imenaDece); $i++) {
            $dete_id = DB::table("deca")->insertGetId([
                "ime" => $imenaDece[$i],
                "prezime" => $prezimenaDece[$i],
                "jmbg" => rand(1000000000000, 9999999999999),
                "ime_roditelja" => $imenaRoditelja[$i],
                "prezime_roditelja" => $prezimenaDece[$i],
                "broj_licne_karte" => rand(100000000, 999999999),
                "adresa" => $faker->address,
                "created_at" => Carbon::now("Europe/Belgrade")
            ]);
            DB::table("ugovori")->insert([
                "dete_id" => $dete_id,
                "broj_ugovora" => $dete_id . "-22",
                "active" => 1,
                "ime_nosioca" => $imenaRoditelja[$i],
                "prezime_nosioca" => $prezimenaDece[$i],
                "broj_licne_karte" => rand(100000000, 999999999),
                "created_at" => Carbon::now("Europe/Belgrade"),
                "updated_at" => null
            ]);
        }
    }
}

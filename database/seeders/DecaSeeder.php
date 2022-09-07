<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 40; $i++) {
            $ime = $faker->firstName;
            $prezime = $faker->lastName;
            $brojLicenKarte = rand(100000000, 999999999);
            $dete_id = DB::table("deca")->insertGetId([
                "ime" => $ime,
                "prezime" => $prezime,
                "jmbg" => rand(1000000000000, 9999999999999),
                "ime_roditelja" => $faker->firstName,
                "prezime_roditelja" => $faker->lastName,
                "broj_licne_karte" => $brojLicenKarte,
                "adresa" => $faker->address,
                "created_at" => Carbon::now("Europe/Belgrade")
            ]);
            for ($j = 2; $j <= 3; $j++) {
                $limit = 12;
                if ($j == 12) $limit = 9;
                for ($k = 1; $k <= $limit; $k++) {
                    $placeno = 28000;
                    $rand = rand(1, 5);
                    if ($rand == 5) $placeno = 0;
                    if ($j == 12) $placeno = 28000;
                    DB::table("fakture")->insert([
                        "dete_id" => $dete_id,
                        "mesec_id" => $k,
                        "godina_id" => $j,
                        "iznos" => 28000,
                        "placeno" => $placeno,
                        "created_at" => Carbon::now("Europe/Belgrade")
                    ]);
                }
            }
            for ($p = 20; $p <= 22; $p++) {
                $active = $p == 22 ? 1 : 0;
                DB::table("ugovori")->insert([
                    "dete_id" => $dete_id,
                    "broj_ugovora" => $dete_id . "-" . $p,
                    "active" => $active,
                    "ime_nosioca" => $ime . "-U",
                    "prezime_nosioca" => $prezime . "-U",
                    "broj_licne_karte" => $brojLicenKarte,
                    "created_at" => Carbon::now("Europe/Belgrade"),
                    "updated_at" => null
                ]);
            }
        }

        /* for ($i = 0; $i < 40; $i++) {
            DB::table("ugovori")->insert([
                "dete_id" => $i + 1,
                "broj_ugovora" => $i + 1 . "/21",
                "active" => 0,
                "ime_nosioca" => $ime,
                "prezime_nosioca" => $prezime,
                "broj_licne_karte" => $brojLicenKarte,
                "created_at" => Carbon::now("Europe/Belgrade"),
                "updated_at" => null
            ]);
        }
        for ($i = 0; $i < 40; $i++) {
            DB::table("ugovori")->insert([
                "dete_id" => $i + 1,
                "broj_ugovora" => $i + 1 . "/22",
                "active" => 1,
                "ime_nosioca" => $ime,
                "prezime_nosioca" => $prezime,
                "broj_licne_karte" => $brojLicenKarte,
                "created_at" => Carbon::now("Europe/Belgrade"),
                "updated_at" => null
            ]);
        } */
    }
}

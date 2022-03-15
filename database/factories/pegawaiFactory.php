<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pegawai;
use Faker\Generator as Faker;

$factory->define(Pegawai::class, function (Faker $faker) {
    return [
        'agama' => $faker -> agama,
        'file' => $faker -> file,
        'nama_pegawai' => $faker->name,
        'tanggal_lahir' => $faker->tanggal_lahir,
        'no' => $faker->unique()->safeno,
        'alamat' => $faker->secondaryAddress,
        

    ];
});

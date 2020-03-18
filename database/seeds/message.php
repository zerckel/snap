<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class message extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('messages')->insert([
            'created_at' => \Carbon\Carbon::now(),
            'photo_url' => $faker->imageUrl(),
            'open' => 0,
            'message' => $faker->realText(),
            'code' => Str::random(60)
        ]);
    }
}

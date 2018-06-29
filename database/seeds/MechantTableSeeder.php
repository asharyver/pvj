<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
//use Faker\Factory;

class MerchantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // Truncate (clear) table
        DB::table('merchants')->truncate();

        // Insert Main User
        DB::table('merchants')->insert([
            'email' => 'admin@admin.com',
            'telp' => $faker->e164PhoneNumber,
            'lokasi' => $faker->state,
        ]);

        // Make seed
        factory(App\Merchant::class, 20)->create();
    }
}

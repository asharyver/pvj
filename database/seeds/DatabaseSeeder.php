<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Multiple call with array
        $this->call([
            UsersTableSeeder::class,
            MerchantTableSeeder::class,
            SmsTableSeeder::class
        ]);
    }
}

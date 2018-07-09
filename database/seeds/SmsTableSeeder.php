<?php

use Illuminate\Database\Seeder;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate (clear) table
        DB::table('sms')->truncate();
        
        // Make seed
        factory(App\Sms::class, 50)->create();
    }
}

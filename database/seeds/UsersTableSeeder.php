<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate (clear) table
        DB::table('users')->truncate();

        // Insert Main User
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'remember_token' => str_random(10),
            'level' => 'admin',
            'logo' => 'image',
            'nm_merchant' => 'paypro',
            'created_at' => Carbon::now()
        ]);

        // Make seed
        factory(App\User::class, 10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administrators')->delete();

        Administrator::create([
            'name' => 'Benny Rahmat',
            'username' => 'akunbeben',
            'email' => 'akunbeben@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

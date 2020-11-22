<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        $rolesList = [
            ['name' => 'IGL'],
            ['name' => 'Scout'],
            ['name' => 'Rusher'],
            ['name' => 'Sniper'],
            ['name' => 'Support'],
            ['name' => 'Substitute'],
        ];

        foreach ($rolesList as $value) {
            Role::create(array(
                'name' => $value['name'],
            ));
        }
    }
}

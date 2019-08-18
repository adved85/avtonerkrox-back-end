<?php

use Illuminate\Database\Seeder;

use App\Roles;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id'=>1, 'role_name'=>'admin'],
            ['id'=>2, 'role_name'=>'client'],            
        ];

        foreach ($roles as $key => $value) {
            Roles::create($value);
        }
    }
}

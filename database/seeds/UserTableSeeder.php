<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Armen',
            'last_name'=>'Arakelyan',
            'role_id'=>1,
            'email'=>'armen@webex.am',
            'password'=> bcrypt('secret'),
            'phone_number'=>'+37496275667',
            'passport'=>'AM1234567',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),            
        ]);

        DB::table('users')->insert([
            'name'=>'Suro',
            'last_name'=>'Suryan',
            'role_id'=>2,
            'email'=>'suro@webex.am',
            'password'=> bcrypt('secret'),
            'phone_number'=>'+37477275667',
            'passport'=>'AM1122334',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

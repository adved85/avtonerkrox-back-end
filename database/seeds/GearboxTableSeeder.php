<?php

use Illuminate\Database\Seeder;
use App\Gearbox;

class GearboxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gearbox_types = [
            ['id'=>1, 'g_type'=>'manual'],
            ['id'=>2, 'g_type'=>'automatic'],
            ['id'=>3, 'g_type'=>'semi-automatic'],
            ['id'=>4, 'g_type'=>'CVT variable'],
        ];

        foreach ($gearbox_types as $key => $value) {
            Gearbox::create($value);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\EngineType;

class EngineTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engine_types = [
            ['id'=>1, 'e_type'=>'gasoline'],
            ['id'=>2, 'e_type'=>'diesel'],
            ['id'=>3, 'e_type'=>'gas'],
            ['id'=>4, 'e_type'=>'hybrid'],
            ['id'=>5, 'e_type'=>'gasoline / gas'],
            ['id'=>6, 'e_type'=>'electric'],

        ];

        foreach ($engine_types as $key => $value) {
            EngineType::create($value);
        }        
    }
}

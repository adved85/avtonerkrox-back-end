<?php

use Illuminate\Database\Seeder;
use App\SteeringWheel;

class SteeringWheelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sw_types = [
            ['id'=>1, 'sw_type'=>'left'],
            ['id'=>2, 'sw_type'=>'right'],
        ];

        foreach ($sw_types as $key => $value) {
            SteeringWheel::create($value);
        }        
    }
}

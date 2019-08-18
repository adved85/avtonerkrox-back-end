<?php

use Illuminate\Database\Seeder;
use App\Statement;

class StatementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statements = [
            [
                'id'=>1,
                'user_id'=>1,
                'status' =>0, // 0 is default and it's ok
                'make_id'=>5, // Audi
                'model_id'=>55, // A5
                'body_type_id'=>4, //coupe
                'doors'=>2,
                'year'=>'2010',
                'mileage'=>'70000', // only km
                'engine_type_id'=>1, // gasoline
                'engine_value'=>'3.2', // beforesaving we add "L" letter
                'pistons'=>6,
                'gearbox_id'=>1, // manual
                'drivetrain_id'=>3, // AWD
                'steering_wheel_id'=>1, // left
                'color_id'=>1, // white
                'price'=>'14.000',
                'currency_id'=>2, // dollars
                'customs'=>false, // it's default
                'view'=>2,
                'thumb'=>'img/audia5.png',
                'description'=>'no description',
            ]
        ];

        foreach ($statements as $key => $value) {
            Statement::create($value);
        }
    }
}

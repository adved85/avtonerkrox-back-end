<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
            ['id' => 1, 'color_name'=>'white'],
            ['id' => 2, 'color_name'=>'black'],
            ['id' => 3, 'color_name'=>'red'],            
            ['id' => 4, 'color_name'=>'green'],
            ['id' => 5, 'color_name'=>'blue'],
            ['id' => 6, 'color_name'=>'orange'],
            
            ['id' => 7, 'color_name'=>'brown'],
            ['id' => 8, 'color_name'=>'purple'],
            ['id' => 9, 'color_name'=>'grey'],
            
            ['id' => 10, 'color_name'=>'yellow'],            
            ['id' => 11, 'color_name'=>'pink'],
            ['id' => 12, 'color_name'=>'sky'],

            ['id' => 13, 'color_name'=>'silver'],
            ['id' => 14, 'color_name'=>'gold'],
        ];

        foreach ($colors as $key => $value) {
            Color::create($value);
        }
    }
}

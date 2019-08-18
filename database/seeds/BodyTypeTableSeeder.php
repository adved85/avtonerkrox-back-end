<?php

use Illuminate\Database\Seeder;
use App\BodyType;
use Illuminate\Support\Facades\DB;

class BodyTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $body_types= [
            ['id'=>1,'b_type'=>'sedan'],
            ['id'=>2,'b_type'=>'hatchback'],
            ['id'=>3,'b_type'=>'wagon'],
            ['id'=>4,'b_type'=>'coupe'],

            ['id'=>5,'b_type'=>'convertible'],
            ['id'=>6,'b_type'=>'SUV / truck'],

            ['id'=>7,'b_type'=>'pickup truck'],
            ['id'=>8,'b_type'=>'minivan'],
            ['id'=>9,'b_type'=>'van'],
            ['id'=>10, 'b_type'=>'limousine']
        ];
        // DB::table('body_types')->insert($body_types); // this style will not filling dates (created_at/updated_at)
        foreach ($body_types as $key => $value) {
            BodyType::create($value); // fill full columns
        }
        
    }
}

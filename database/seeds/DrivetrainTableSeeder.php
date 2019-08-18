<?php

use Illuminate\Database\Seeder;
use App\Drivetrain;

class DrivetrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $drivetrains = [
            ['id'=>1, 'd_type'=>'rear-wheel-drive'],
            ['id'=>2, 'd_type'=>'front-wheel-drive'],
            ['id'=>3, 'd_type'=>'all-wheel-drive'],
            
        ];

        foreach ($drivetrains as $key => $value) {
            Drivetrain::create($value);
        }
    }
}

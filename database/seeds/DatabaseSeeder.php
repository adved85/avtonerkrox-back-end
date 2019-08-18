<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BodyTypeTableSeeder::class);
        $this->call(EngineTypeTableSeeder::class);
        $this->call(GearboxTableSeeder::class);
        $this->call(DrivetrainTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(SteeringWheelTableSeeder::class);
        $this->call(CurrencyTableSeeder::class);
        // $this->call(StatementTableSeeder::class);
        

        $make_model_path = 'app/this_app/makes_models.sql';
        
        try {
            DB::unprepared(file_get_contents($make_model_path));
            $this->command->info('make_model_path');
          } catch(\Illuminate\Database\QueryException $ex){ 
            // dd($ex->getMessage());
            $this->command->info($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
          }
    }
}

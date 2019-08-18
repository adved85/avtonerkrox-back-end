<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            ['id'=>1, 'crc_code'=>'AMD','crc_symbol'=>'֏', 'crc_name'=>'dram'],
            ['id'=>2, 'crc_code'=>'USD','crc_symbol'=>'$', 'crc_name'=>'dollars'],
            ['id'=>3, 'crc_code'=>'EUR','crc_symbol'=>'€', 'crc_name'=>'euro'],
            ['id'=>4, 'crc_code'=>'RUB','crc_symbol'=>'руб', 'crc_name'=>'Rubles'],
        ];

        foreach ($currencies as $key => $value) {
            Currency::create($value);
        }
    }
}

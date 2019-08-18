<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carmodels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id')->unsigned()->default(0);
            $table->string('code', 125)->default('')->comment('showrt model name');
            $table->string('title', 125)->default('')->index()->commet('full name of model');
            $table->timestamps();

        });

        DB::update('ALTER TABLE carmodels AUTO_INCREMENT = 1315;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carmodels');
    }
}

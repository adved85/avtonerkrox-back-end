<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->integer('status')->default(0)->comment('can be -1,0,1,2');

            $table->integer('make_id')->unsigned()->default(0)->index();
            $table->integer('model_id')->unsigned()->default(0)->index();
            $table->integer('body_type_id')->unsigned()->default(0);
            $table->integer('doors')->unsigned()->default(0);
            $table->string('year')->default('0');
            $table->string('mileage')->default('0');
            $table->integer('engine_type_id')->unsigned()->default(0);
            $table->string('engine_value', 6)->default('0L');
            $table->integer('pistons')->unsigned()->default(0);

            $table->integer('gearbox_id')->unsigned()->default(0);
            $table->integer('drivetrain_id')->unsigned()->default(0);

            $table->integer('steering_wheel_id')->unsigned()->default(0);
            $table->integer('color_id')->unsigned()->default(0);

            $table->string('price')->default('000');
            $table->integer('currency_id')->unsigned()->default(0);
                        
            $table->boolean('customs')->default(false);
            $table->integer('view')->unsigned()->default(0);
            $table->string('thumb')->default('img/no-img.png');
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
}

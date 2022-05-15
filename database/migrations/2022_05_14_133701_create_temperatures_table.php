<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('city1_name')->nullable();
            $table->decimal('city1_temp_f',5,2)->nullable();
            $table->decimal('city1_temp_c',5,2)->nullable();
            $table->string('city2_name')->nullable();
            $table->decimal('city2_temp_f',5,2)->nullable();
            $table->decimal('city2_temp_c',5,2)->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('temperatures');
    }
}
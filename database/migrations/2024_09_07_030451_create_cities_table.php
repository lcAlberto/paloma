<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('state_id')->index();
                $table->string('state_code');
                $table->unsignedBigInteger('country_id')->index();
                $table->string('country_code');
                $table->string('latitude')->nullable();
                $table->string('longitude')->nullable();
                $table->boolean('flag')->default(false);
                $table->string('wikiDataId')->nullable();

                $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

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
        Schema::dropIfExists('cities');
    }
}

<?php

use App\Enums\AnimalHeatChildbirthTypeEnum;
use App\Enums\AnimalHeatStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreedingRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeding_records', function (Blueprint $table) {
            $table->id();
            $table->timestamp('occurrence_date')->nullable();// data da apresentação do cio
            $table->timestamp('coverage_date')->nullable();
            $table->timestamp('date_birth_prediction')->nullable();
            $table->timestamp('date_birth')->nullable();
            $table->enum('status', AnimalHeatStatusEnum::getConstantsValues())->default('pending');
            $table->enum('cover_method', AnimalHeatChildbirthTypeEnum::getConstantsValues())->nullable();

            $table->foreignId('female_id')
                ->nullable()
                ->constrained('animals')
                ->onDelete('cascade');

            $table->foreignId('male_id')
                ->nullable()
                ->constrained('animals')
                ->onDelete('set null');

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
        Schema::dropIfExists('breeding_records');
    }
}

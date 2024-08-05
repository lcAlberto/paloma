<?php

use App\Enums\AnimalClassEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('name');
            $table->string('born_date');
            $table->string('breed')->nullable();
            $table->enum('sex', AnimalSexEnum::getConstantsValues());
            $table->enum('classification', AnimalClassEnum::getConstantsValues());
            $table->enum('status', AnimalStatusEnum::getConstantsValues());
            $table->string('image')->nullable();

            $table->foreignId('father_id')
                ->nullable()
                ->constrained('animals')
                ->onDelete('set null');
            $table->foreignId('mother_id')
                ->nullable()
                ->constrained('animals')
                ->onDelete('set null');

            $table->foreignId('farm_id')
                ->constrained()
                ->onDelete('cascade');
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
        Schema::dropIfExists('animals');
    }
}

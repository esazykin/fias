<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressObjectTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('address_object_types', function (Blueprint $table) {
            $table->increments('id');

            $table->string('LEVEL', 5)->nullable()->comment('Уровень адресного объекта')->index();
            $table->string('SCNAME', 10)->nullable()->comment('Краткое наименование типа объекта')->index();
            $table->string('SOCRNAME', 50)->nullable()->comment('Полное наименование типа объекта')->index();
            $table->string('KOD_T_ST', 4)->nullable()->comment('Ключевое поле')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('address_object_types');
    }
}

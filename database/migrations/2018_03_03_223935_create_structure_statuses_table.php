<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStructureStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('structure_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('STRSTATID')->nullable()->comment('Признак строения')->index();
            $table->string('NAME', 20)->nullable()->comment('Наименование')->index();
            $table->string('SHORTNAME', 20)->nullable()->comment('Краткое наименование')->index();

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
        Schema::dropIfExists('structure_statuses');
    }
}

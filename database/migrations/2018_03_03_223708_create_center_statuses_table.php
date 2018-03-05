<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenterStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('center_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('CENTERSTID')->nullable()->comment('Идентификатор статуса')->index();
            $table->string('NAME', 100)->nullable()->comment('Наименование')->index();

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
        Schema::dropIfExists('center_statuses');
    }
}

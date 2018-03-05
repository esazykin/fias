<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntervalStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('interval_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->tinyInteger('INTVSTATID')->nullable()->comment('Идентификатор статуса (обычный, четный, нечетный)')->index();
            $table->string('NAME', 60)->nullable()->comment('Наименование')->index();

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
        Schema::dropIfExists('interval_statuses');
    }
}

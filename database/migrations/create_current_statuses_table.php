<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('current_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('CURENTSTID')->nullable()->comment('Идентификатор статуса (ключ)')->index();
            $table->string('NAME', 100)->nullable()->comment('Наименование (0 - актуальный, 1-50, 2-98 – исторический (кроме 51), 51 - переподчиненный, 99 - несуществующий)')->index();

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
        Schema::dropIfExists('current_statuses');
    }
}

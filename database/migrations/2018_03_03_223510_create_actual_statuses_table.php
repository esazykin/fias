<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActualStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('actual_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('ACTSTATID')->nullable()->comment('Идентификатор статуса (ключ)')->index();
            $table->string('NAME', 100)->nullable()->comment('Наименование 0 – Не актуальный 1 – Актуальный (последняя запись по адресному объекту)')->index();

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
        Schema::dropIfExists('actual_statuses');
    }
}

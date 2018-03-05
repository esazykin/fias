<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('operation_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('OPERSTATID')->nullable()->comment('Идентификатор статуса (ключ)')->index();
            $table->string('NAME', 100)->nullable()->comment('Наименование (см. таблицу OperationStatuses)')->index();

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
        Schema::dropIfExists('operation_statuses');
    }
}

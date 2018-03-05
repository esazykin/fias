<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHouseStateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('house_state_statuses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('HOUSESTID')->nullable()->comment('Идентификатор статуса')->index();
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
        Schema::dropIfExists('house_state_statuses');
    }
}

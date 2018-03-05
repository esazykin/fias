<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormativeDocumentTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('normative_document_types', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('NDTYPEID')->nullable()->comment('Идентификатор')->index();
            $table->string('NAME')->nullable()->comment('Наименование')->index();

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
        Schema::dropIfExists('normative_document_types');
    }
}

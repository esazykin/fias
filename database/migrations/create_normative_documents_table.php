<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNormativeDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('normative_documents', function (Blueprint $table) {
            $table->increments('id');

            $table->string('NORMDOCID', 36)->nullable()->comment('Идентификатор нормативного документа')->index();
            $table->text('DOCNAME')->nullable()->comment('Наименование документа');
            $table->date('DOCDATE')->nullable()->comment('Дата документа')->index();
            $table->string('DOCNUM', 20)->nullable()->comment('Номер документа')->index();
            $table->integer('DOCTYPE')->nullable()->comment('Тип документа')->index();
            $table->integer('DOCIMGID')->nullable()->comment('Идентификатор образа (внешний ключ)')->index();

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
        Schema::dropIfExists('normative_documents');
    }
}

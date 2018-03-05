<?php

declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSteadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('steads', function (Blueprint $table) {
            $table->increments('id');

            $table->string('STEADGUID', 36)->nullable()->comment('Глобальный уникальный идентификатор земельного участка')->index();
            $table->string('NUMBER', 250)->nullable()->comment('Номер участка')->index();
            $table->string('REGIONCODE', 2)->nullable()->comment('Код региона')->index();
            $table->string('POSTALCODE', 6)->nullable()->comment('Почтовый индекс')->index();
            $table->string('IFNSFL', 4)->nullable()->comment('Код ИФНС ФЛ');
            $table->string('TERRIFNSFL', 4)->nullable()->comment('Код территориального участка ИФНС ФЛ');
            $table->string('IFNSUL', 4)->nullable()->comment('Код ИФНС ЮЛ');
            $table->string('TERRIFNSUL', 4)->nullable()->comment('Код территориального участка ИФНС ЮЛ');
            $table->string('OKATO', 11)->nullable()->comment('ОКАТО')->index();
            $table->string('OKTMO', 11)->nullable()->comment('ОКТМО')->index();
            $table->date('UPDATEDATE')->nullable()->comment('Дата внесения (обновления) записи')->index();
            $table->string('PARENTGUID', 36)->nullable()->comment('Идентификатор родительского объекта')->index();
            $table->string('STEADID', 36)->nullable()->comment('Уникальный идентификатор записи. Ключевое поле.')->index();
            $table->string('PREVID', 36)->nullable()->comment('Идентификатор записи связывания с предыдущей исторической записью')->index();
            $table->string('NEXTID', 36)->nullable()->comment('Идентификатор записи связывания с последующей исторической записью')->index();
            $table->integer('OPERSTATUS')->nullable()->comment('Статус действия над записью – причина появления записи (см. таблицу OperationStatuses)')->index();
            $table->date('STARTDATE')->nullable()->comment('Начало действия записи')->index();
            $table->date('ENDDATE')->nullable()->comment('Окончание действия записи')->index();
            $table->string('NORMDOC', 36)->nullable()->comment('Внешний ключ на нормативный документ');
            $table->tinyInteger('LIVESTATUS')->nullable()->comment('Статус актуальности адресного объекта ФИАС на текущую дату: 0 – Не актуальный 1 - Актуальный')->index();
            $table->string('CADNUM', 100)->nullable()->comment('Кадастровый номер')->index();
            $table->integer('DIVTYPE')->nullable()->comment('Тип деления: 0 – не определено 1 – муниципальное 2 – административное');

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
        Schema::dropIfExists('steads');
    }
}

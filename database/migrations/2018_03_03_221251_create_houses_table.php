<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('POSTALCODE', 6)->nullable()->comment('Почтовый индекс')->index();
            $table->string('IFNSFL', 4)->nullable()->comment('Код ИФНС ФЛ');
            $table->string('TERRIFNSFL', 4)->nullable()->comment('Код территориального участка ИФНС ФЛ');
            $table->string('IFNSUL', 4)->nullable()->comment('Код ИФНС ЮЛ');
            $table->string('TERRIFNSUL', 4)->nullable()->comment('Код территориального участка ИФНС ЮЛ');
            $table->string('OKATO', 11)->nullable()->comment('ОКАТО')->index();
            $table->string('OKTMO', 11)->nullable()->comment('ОКТМО')->index();
            $table->date('UPDATEDATE')->nullable()->comment('Дата внесения (обновления) записи')->index();
            $table->string('HOUSENUM', 20)->nullable()->comment('Номер дома')->index();
            $table->tinyInteger('ESTSTATUS')->nullable()->comment('Признак владения')->index();
            $table->string('BUILDNUM', 10)->nullable()->comment('Номер корпуса')->index();
            $table->string('STRUCNUM', 10)->nullable()->comment('Номер строения')->index();
            $table->integer('STRSTATUS')->nullable()->comment('Признак строения')->index();
            $table->string('HOUSEID', 36)->nullable()->comment('Уникальный идентификатор записи дома')->index();
            $table->string('HOUSEGUID', 36)->nullable()->comment('Глобальный уникальный идентификатор дома')->index();
            $table->string('AOGUID', 36)->nullable()->comment('Guid записи родительского объекта (улицы, города, населенного пункта и т.п.)')->index();
            $table->date('STARTDATE')->nullable()->comment('Начало действия записи')->index();
            $table->date('ENDDATE')->nullable()->comment('Окончание действия записи')->index();
            $table->tinyInteger('STATSTATUS')->nullable()->comment('Состояние дома')->index();
            $table->string('NORMDOC')->nullable()->comment('Состояние дома')->index();
            $table->integer('COUNTER')->nullable()->comment('Счетчик записей зданий, сооружений для формирования классификационного кода');
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
        Schema::dropIfExists('houses');
    }
}

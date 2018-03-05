<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('AOGUID', 36)->nullable()->nullable()->comment('Глобальный уникальный идентификатор адресного объекта')->index();
            $table->string('FORMALNAME', 120)->nullable()->comment('Формализованное наименование')->index();
            $table->string('REGIONCODE', 2)->nullable()->comment('Код региона')->index();
            $table->string('AUTOCODE', 1)->nullable()->comment('Код автономии')->index();
            $table->string('AREACODE', 3)->nullable()->comment('Код района')->index();
            $table->string('CITYCODE', 3)->nullable()->comment('Код города')->index();
            $table->string('CTARCODE', 3)->nullable()->comment('Код внутригородского района')->index();
            $table->string('PLACECODE', 3)->nullable()->comment('Код населенного пункта')->index();
            $table->string('PLANCODE', 4)->nullable()->comment('Код элемента планировочной структуры')->index();
            $table->string('STREETCODE', 4)->nullable()->comment('Код улицы')->index();
            $table->string('EXTRCODE', 4)->nullable()->comment('Код дополнительного адресообразующего элемента');
            $table->string('SEXTCODE', 3)->nullable()->comment('Код подчиненного дополнительного адресообразующего элемента');
            $table->string('OFFNAME', 120)->nullable()->comment('Официальное наименование')->index();
            $table->string('POSTALCODE', 6)->nullable()->comment('Почтовый индекс')->index();
            $table->string('IFNSFL', 4)->nullable()->comment('Код ИФНС ФЛ');
            $table->string('TERRIFNSFL', 4)->nullable()->comment('Код территориального участка ИФНС ФЛ');
            $table->string('IFNSUL', 4)->nullable()->comment('Код ИФНС ЮЛ');
            $table->string('TERRIFNSUL', 4)->nullable()->comment('Код территориального участка ИФНС ЮЛ');
            $table->string('OKATO', 11)->nullable()->comment('ОКАТО')->index();
            $table->string('OKTMO', 11)->nullable()->comment('ОКТМО')->index();
            $table->date('UPDATEDATE')->nullable()->comment('Дата внесения (обновления) записи')->index();
            $table->string('SHORTNAME', 10)->nullable()->comment('Краткое наименование типа объекта')->index();
            $table->integer('AOLEVEL')->nullable()->comment('Уровень адресного объекта')->index();
            $table->string('PARENTGUID', 36)->nullable()->comment('Идентификатор объекта родительского объекта')->index();
            $table->string('AOID', 36)->nullable()->comment('Уникальный идентификатор записи. Ключевое поле.')->index();
            $table->string('PREVID', 36)->nullable()->comment('Идентификатор записи связывания с предыдушей исторической записью')->index();
            $table->string('NEXTID', 36)->nullable()->comment('Идентификатор записи связывания с последующей исторической записью')->index();
            $table->string('CODE', 17)->nullable()->comment('Код адресного элемента одной строкой с признаком актуальности из классификационного кода')->index();
            $table->string('PLAINCODE', 15)->nullable()->comment('Код адресного элемента одной строкой без признака актуальности (последних двух цифр)');
            $table->tinyInteger('ACTSTATUS')->nullable()->comment('Статус последней исторической записи в жизненном цикле адресного объекта: 0 – Не последняя 1 - Последняя')->index();
            $table->tinyInteger('LIVESTATUS')->nullable()->comment('Статус актуальности адресного объекта ФИАС на текущую дату: 0 – Не актуальный 1 - Актуальный')->index();
            $table->integer('CENTSTATUS')->nullable()->comment('Статус центра');
            $table->integer('OPERSTATUS')->nullable()->comment('Статус действия над записью – причина появления записи (см. OperationStatuses)')->index();
            $table->integer('CURRSTATUS')->nullable()->comment('Статус актуальности КЛАДР 4 (последние две цифры в коде)');
            $table->date('STARTDATE')->nullable()->comment('Начало действия записи')->index();
            $table->date('ENDDATE')->nullable()->comment('Окончание действия записи')->index();
            $table->string('NORMDOC', 36)->nullable()->comment('Внешний ключ на нормативный документ')->index();
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
        Schema::dropIfExists('objects');
    }
}

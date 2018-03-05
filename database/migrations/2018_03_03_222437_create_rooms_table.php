<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ROOMID', 36)->nullable()->comment('Уникальный идентификатор записи помещения')->index();
            $table->string('ROOMGUID', 36)->nullable()->comment('Глобальный уникальный идентификатор помещения')->index();
            $table->string('HOUSEGUID', 36)->nullable()->comment('Глобальный уникальный идентификатор родительского объекта (дома)')->index();
            $table->string('REGIONCODE', 2)->nullable()->comment('Код региона')->index();
            $table->string('FLATNUMBER', 50)->nullable()->comment('Номер квартиры, офиса и прочего')->index();
            $table->integer('FLATTYPE')->nullable()->comment('Тип квартиры')->index();
            $table->string('ROOMNUMBER', 50)->nullable()->comment('Номер комнаты или помещения')->index();
            $table->integer('ROOMTYPEID')->nullable()->comment('Тип комнаты')->index();
            $table->string('POSTALCODE', 6)->nullable()->comment('Почтовый индекс')->index();
            $table->date('UPDATEDATE')->nullable()->comment('Дата внесения (обновления) записи')->index();
            $table->string('PREVID', 36)->nullable()->comment('Идентификатор записи связывания с предыдушей исторической записью')->index();
            $table->string('NEXTID', 36)->nullable()->comment('Идентификатор записи связывания с последующей исторической записью')->index();
            $table->date('STARTDATE')->nullable()->comment('Начало действия записи')->index();
            $table->date('ENDDATE')->nullable()->comment('Окончание действия записи')->index();
            $table->tinyInteger('LIVESTATUS')->nullable()->comment('Статус актуальности адресного объекта ФИАС на текущую дату: 0 – Не актуальный 1 - Актуальный')->index();
            $table->string('NORMDOC', 36)->nullable()->comment('Внешний ключ на нормативный документ')->index();
            $table->string('CADNUM', 100)->nullable()->comment('Кадастровый номер')->index();

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
        Schema::dropIfExists('rooms');
    }
}

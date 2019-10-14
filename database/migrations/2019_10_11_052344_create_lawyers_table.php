<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLawyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('last_name');
            $table->string('first_name');
            $table->string('image')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('telephone');
            $table->string('email');
            $table->string('link')->nullable();
            $table->string('worktime')->nullable()->comment('Режим работы');
            $table->string('time')->nullable()->comment('Часы работы');
            $table->string('education')->nullable();
            $table->string('extra')->nullable();
            $table->string('advokat_licence')->nullable();
            $table->string('langs')->nullable();
            $table->string('work_experience')->nullable()->comment('Стаж работы');
            $table->string('practice')->nullable()->comment('Опыт');
            $table->string('work_for')->nullable()->comment('Оказание услуг для');
            $table->integer('is_free')->nullable()->default(0)->comment('Предоставляете ли Вы юридическую помощь на бесплатной основе');
            $table->integer('is_member')->nullable()->default(0)->comment('Являетесь ли Вы (фирма) членом каких либо ассоциаций (союзов, объединений) юридических фирм, в том числе международных');
            $table->integer('price')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('city_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lawyers');
    }
}

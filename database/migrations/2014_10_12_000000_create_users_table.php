<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email',128)->unique()->nullable();//поле ввода обязательное
            $table->string('password',64);
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('is_admin')->nullable();
            $table->string('logo',256);//поле ввода обязательное
            $table->string('name',256);//поле ввода обязательное
            $table->string('surname',256)->nullable();//поле ввода
            $table->string('last_name',256)->nullable();//поле ввода
            $table->string('country',64)->nullable();//поле ввода
            $table->string('region',64)->nullable();//поле ввода
            $table->string('city',64);//поле ввода обязательное
            $table->string('addr',256)->nullable();//поле ввода
            $table->string('phone',64)->unique();//поле ввода обязательное
            $table->tinyInteger('phone_auth')->nullable();//поле для ввода
            $table->string('website',128)->nullable();
            $table->enum('type',array('company','user','administrator'));
            $table->mediumText('page')->nullable();
            $table->string('ssid',32)->nullable();
            $table->tinyInteger('auth')->nullable();
            $table->string('auth_code',64)->nullable();
            $table->dateTime('reg_date')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->enum('status',array('active','warning','blocked','off'));
            $table->string('birthday',32)->nullable();//поле ввода
            $table->string('fax',32)->nullable();
            $table->string('zip',16)->nullable();
            $table->string('org_name',64)->nullable();
            $table->string('inn',32)->nullable();
            $table->string('pdf',256)->nullable();
            $table->dateTime("last_online_at")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

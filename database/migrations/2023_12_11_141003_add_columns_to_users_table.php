<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('surname');
            $table->string('firstname');
            $table->string('other_names')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('gender');
            $table->string('state');
            $table->tinyInteger('is_parent');
            $table->tinyInteger('is_teacher');
            $table->tinyInteger('is_admin');
            $table->tinyInteger('is_active');
            $table->integer('activation_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('surname');
            $table->string('firstname');
            $table->string('other_names')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('gender');
            $table->string('state');
            $table->tinyInteger('is_parent');
            $table->tinyInteger('is_teacher');
            $table->tinyInteger('is_admin');
            $table->tinyInteger('is_active');
            $table->integer('activation_code');
        });
    }
};

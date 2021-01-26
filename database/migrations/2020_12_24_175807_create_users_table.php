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
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->enum('gender', ['male', 'female']);
            $table->date('birth_date');
            $table->enum('social_status', ['single', 'engaged', 'married', 'widower', 'divorced']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone');
            $table->string('users_image')->nullable();
            $table->Integer('role')->default(0);//0 user, 1 sheikh, 2 superadmin
            $table->mediumInteger('reset_pass')->default(0);//0 no, 1 yes
            $table->mediumInteger('disable_account')->default(0);//0 no, 1 yes
            $table->unsignedInteger('specialize_id')->nullable();
            $table->foreign('specialize_id')->references('id')->on('specializes')->onDelete('set null')->onUpdate('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

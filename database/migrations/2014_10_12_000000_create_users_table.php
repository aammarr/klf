<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateUsersTable extends Migration
{
    use SoftDeletes;
    protected $table = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('access_token')->nullable();
            $table->string('full_name')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->double('lat')->default(0);
            $table->double('long')->default(0);
            $table->string('device')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('notifications')->nullable();
            $table->string('social_login')->nullable();
            $table->string('social_id')->nullable();
            $table->string('remember_token')->nullable();
            $table->timestamps();
            $table->softDeletes();
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

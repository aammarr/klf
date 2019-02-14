<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreatePrizeAwardsTable extends Migration
{
    
    use SoftDeletes;
    protected $table = 'prize_awards';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prize_awards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('prize_name')->nullable();
            $table->string('prize_avatar')->nullable();
            $table->string('prize_details')->nullable();
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
        Schema::dropIfExists('prize_awards');
    }
}

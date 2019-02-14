<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\SoftDeletes;

class CreateEventsTable extends Migration
{
    use SoftDeletes;
    protected $table = 'events';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name')->nullable();
            $table->date('event_date')->nullable();
            $table->timestamp('event_startTime')->nullable();
            $table->string('event_duration')->nullable();
            $table->string('event_venue')->nullable();
            $table->string('event_speaker')->nullable();
            $table->string('event_sponsor')->nullable();
            $table->string('event_topic')->nullable();
            $table->string('event_details')->nullable();
            $table->double('event_lat')->default(0);
            $table->double('event_long')->default(0);
            $table->string('event_avatar')->nullable();
            $table->string('event_year')->nullable();
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
        Schema::dropIfExists('events');
    }
}

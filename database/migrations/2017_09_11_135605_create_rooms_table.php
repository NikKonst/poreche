<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('room_number')->default(0);
            $table->unsignedInteger('room_type')->nullable();
            $table->foreign('room_type')->references('id')->on('room_types')
                ->onDelete('set null');
            $table->string('name')->nullable();
            $table->string('vk_url')->nullable();
            $table->string('room_boss')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('guests')->nullable();

            $table->integer('paid_main')->default(0);
            $table->integer('debt_main')->default(0);
            $table->integer('all_main')->default(0);

            $table->integer('paid_bums')->default(0);
            $table->integer('debt_bums')->default(0);
            $table->integer('all_bums')->default(0);

            $table->text('passport')->nullable();
            $table->text('receipt')->nullable();

            $table->text('food')->nullable();
            $table->text('transfer')->nullable();

            $table->text('comments')->nullable();

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
        Schema::dropIfExists('rooms');
    }
}

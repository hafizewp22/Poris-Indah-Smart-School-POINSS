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
        Schema::create('subjects_details', function (Blueprint $table) {
            $table->id('id_sub_detail');
            $table->string('id_subject');
            $table->date('start_date');
            $table->string('time');
            $table->string('title');
            $table->text('sub_topics');
            $table->string('room');
            $table->text('file_material');
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
        Schema::dropIfExists('subjects_details');
    }
};

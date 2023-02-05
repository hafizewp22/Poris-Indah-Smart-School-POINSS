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
        Schema::create('forum_details', function (Blueprint $table) {
            $table->id('id_forum_detail');
            $table->string('id_forum');
            $table->string('id_user_full1');
            $table->text('description_detail');
            $table->string('done_detail');
            $table->dateTime('date_forum_detail');
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
        Schema::dropIfExists('forum_details');
    }
};

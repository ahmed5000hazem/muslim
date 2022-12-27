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
        Schema::create('art_works', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('work_link')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('type');
            $table->timestamp('show_data')->nullable();
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
        Schema::dropIfExists('art_works');
    }
};

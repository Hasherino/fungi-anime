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
        Schema::create('animes', function (Blueprint $table) {
            $table->id();
            $table->integer('kitsu_id')->nullable();
            $table->string('english_name');
            $table->string('japanese_name')->nullable();
            $table->string('thumbnail')->nullable();
            $table->mediumText('description')->nullable();
            $table->date('premiere')->nullable();
            $table->integer('episode_count')->nullable();
            $table->string('age_restriction')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('popularity')->nullable();
            $table->float('score')->nullable();
            $table->boolean('nsfw')->nullable();
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
        Schema::dropIfExists('animes');
    }
};

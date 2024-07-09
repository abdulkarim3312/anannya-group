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
        Schema::create('category_banners', function (Blueprint $table) {
            $table->id();
            $table->string('category_banner_one')->nullable();
            $table->string('category_banner_two')->nullable();
            $table->string('category_banner_three')->nullable();
            $table->string('category_banner_four')->nullable();
            $table->string('category_banner_five')->nullable();
            $table->string('category_banner_six')->nullable();
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
        Schema::dropIfExists('category_banners');
    }
};

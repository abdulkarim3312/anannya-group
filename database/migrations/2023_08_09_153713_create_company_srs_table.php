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
        Schema::create('company_srs', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->bigInteger('area');
            $table->string('id_no',255);
            $table->string('designation',255)->nullable();
            $table->string('mobile',255);
            $table->string('owner_name',255)->nullable();
            $table->string('email',255)->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->double('opening_due',20,2)->default(0.00);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('company_srs');
    }
};

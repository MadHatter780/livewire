<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('energy', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('section');
            $table->integer('count');
            $table->integer('voltage');
            $table->integer('current');
            $table->integer('powerphase');
            $table->integer('powerfac');
            $table->integer('accenergy');
            $table->integer('sensor');
            $table->integer('count_session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('energies');
    }
};

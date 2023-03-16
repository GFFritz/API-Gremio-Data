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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('age');
            $table->string('country', 30);
            $table->string('nickname', 30)->nullable();
            $table->string('height', 15);
            $table->integer('number');
            $table->integer('foot')->default(1)->comment('1 for right / 2 for left');
            $table->string('position', 25)->comment('An array of Enums to positions');
            $table->string('former_clubs', 350)->comment('An array of string, club names')->nullable();
            $table->integer('active')->default(1)->comment('0 = Inactive / 1 = Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};

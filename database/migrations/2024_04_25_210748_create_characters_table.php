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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('enemy')->default(false);
            $table->integer('defense')->default(0)->unsigned()->min(0)->max(3);
            $table->integer('strength')->default(0)->unsigned()->min(0)->max(20);
            $table->integer('accuracy')->default(0)->unsigned()->min(0)->max(20);
            $table->integer('magic')->default(0)->unsigned()->min(0)->max(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};

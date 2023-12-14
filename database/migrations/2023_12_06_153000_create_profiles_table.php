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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->text('name')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('mobile')->nullable();
            $table->text('address')->nullable();
            $table->text('web')->nullable();
            $table->text('git')->nullable();
            $table->text('fab')->nullable();
            $table->text('dp')->nullable();



            $table->timestamps();
        });

        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};

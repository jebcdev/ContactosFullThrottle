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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->references('id')->on('users')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address');



            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};

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
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 20)->unique();
            $table->string('address', 255);

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

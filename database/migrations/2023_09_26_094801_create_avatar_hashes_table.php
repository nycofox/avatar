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
        Schema::create('avatar_hashes', function (Blueprint $table) {
            $table->string('md5_hash');
            $table->string('sex', 1);
            $table->foreignId('avatar_id')->constrained();
            $table->timestamps();
            $table->primary(['sex', 'md5_hash']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avatar_hashes');
    }
};

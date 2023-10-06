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
        Schema::create('palette__bootstraps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('c100');
            $table->string('c200');
            $table->string('c300');
            $table->string('c400');
            $table->string('c500');
            $table->string('c600');
            $table->string('c700');
            $table->string('c800');
            $table->string('c900');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palette__bootstrap');
    }
};

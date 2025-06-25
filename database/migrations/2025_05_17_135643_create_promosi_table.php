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
        Schema::create('promosi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_promosi');
            $table->text('deskripsi')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->string('kategori_promosi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promosi');
    }
};

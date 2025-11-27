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
        Schema::dropIfExists('pendaftarans');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_santri_id')->constrained('biodata_santris')->onDelete('cascade');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['diterima', 'ditolak'])->nullable();
            $table->timestamps();
        });
    }
};

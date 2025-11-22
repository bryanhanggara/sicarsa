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
        Schema::create('detail_riwayat_penerimaans', function (Blueprint $table) {
            $table->id('id_riwayat');
            $table->unsignedBigInteger('riwayat_penerimaan_id');
            $table->foreignId('id_pendaftaran')->constrained('pendaftarans')->onDelete('cascade');
            $table->timestamps();
            
            $table->foreign('riwayat_penerimaan_id')
                  ->references('id_penerimaan')
                  ->on('riwayat_penerimaans')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_riwayat_penerimaans');
    }
};

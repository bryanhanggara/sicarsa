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
        Schema::table('detail_riwayat_penerimaans', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['id_pendaftaran']);
            
            // Rename column
            $table->renameColumn('id_pendaftaran', 'biodata_santri_id');
        });
        
        Schema::table('detail_riwayat_penerimaans', function (Blueprint $table) {
            // Add new foreign key constraint
            $table->foreign('biodata_santri_id')
                  ->references('id')
                  ->on('biodata_santris')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_riwayat_penerimaans', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['biodata_santri_id']);
            
            // Rename column back
            $table->renameColumn('biodata_santri_id', 'id_pendaftaran');
        });
        
        Schema::table('detail_riwayat_penerimaans', function (Blueprint $table) {
            // Add old foreign key constraint back
            $table->foreign('id_pendaftaran')
                  ->references('id')
                  ->on('pendaftarans')
                  ->onDelete('cascade');
        });
    }
};

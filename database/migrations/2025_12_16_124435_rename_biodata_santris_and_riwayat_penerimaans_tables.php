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
        // Rename biodata_santris table to calon_santris
        if (Schema::hasTable('biodata_santris')) {
            Schema::rename('biodata_santris', 'calon_santris');
        }

        // Rename riwayat_penerimaans table to seleksi_penerimaans
        if (Schema::hasTable('riwayat_penerimaans')) {
            Schema::rename('riwayat_penerimaans', 'seleksi_penerimaans');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback calon_santris table name to biodata_santris
        if (Schema::hasTable('calon_santris')) {
            Schema::rename('calon_santris', 'biodata_santris');
        }

        // Rollback seleksi_penerimaans table name to riwayat_penerimaans
        if (Schema::hasTable('seleksi_penerimaans')) {
            Schema::rename('seleksi_penerimaans', 'riwayat_penerimaans');
        }
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Migrate data from detail_riwayat_penerimaans to biodata_santris
        // Update riwayat_penerimaan_id in biodata_santris based on detail_riwayat_penerimaans
        if (Schema::hasTable('detail_riwayat_penerimaans')) {
            DB::statement("
                UPDATE biodata_santris 
                INNER JOIN detail_riwayat_penerimaans 
                    ON biodata_santris.id = detail_riwayat_penerimaans.biodata_santri_id
                SET biodata_santris.riwayat_penerimaan_id = detail_riwayat_penerimaans.riwayat_penerimaan_id
            ");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Data migration reversal is not straightforward, 
        // so we'll leave this empty or restore from backup if needed
    }
};

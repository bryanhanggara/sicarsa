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
        Schema::table('biodata_santris', function (Blueprint $table) {
            $table->unsignedBigInteger('riwayat_penerimaan_id')->nullable()->after('status_penerimaan');
            
            $table->foreign('riwayat_penerimaan_id')
                  ->references('id_penerimaan')
                  ->on('riwayat_penerimaans')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_santris', function (Blueprint $table) {
            $table->dropForeign(['riwayat_penerimaan_id']);
            $table->dropColumn('riwayat_penerimaan_id');
        });
    }
};

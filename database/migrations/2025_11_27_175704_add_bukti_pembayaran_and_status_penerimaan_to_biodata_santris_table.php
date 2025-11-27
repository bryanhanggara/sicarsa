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
            $table->string('bukti_pembayaran')->nullable()->after('kartu_indonesia_pintar');
            $table->enum('status_penerimaan', ['diterima', 'ditolak'])->nullable()->after('bukti_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_santris', function (Blueprint $table) {
            $table->dropColumn(['bukti_pembayaran', 'status_penerimaan']);
        });
    }
};

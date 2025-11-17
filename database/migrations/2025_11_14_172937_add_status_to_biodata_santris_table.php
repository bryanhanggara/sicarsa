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
            $table->enum('status', ['verified', 'unverified'])->default('unverified')->after('kartu_indonesia_pintar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biodata_santris', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};

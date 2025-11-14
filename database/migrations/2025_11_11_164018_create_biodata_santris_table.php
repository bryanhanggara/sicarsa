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
        Schema::create('biodata_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Biodata Calon Santri
            $table->string('foto')->nullable();
            $table->string('nama_lengkap');
            $table->string('tujuan_jenjang_pendidikan');
            $table->string('nisn')->nullable();
            $table->string('nik_calon_santri')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('anak_ke')->nullable();
            $table->integer('jumlah_bersaudara')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('agama');
            $table->string('asal_sekolah')->nullable();
            $table->string('nomor_dan_tahun_ijazah')->nullable();
            $table->string('no_telepon')->nullable();
            
            // Biodata Diri Ayah
            $table->string('nama_lengkap_ayah');
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('nomor_telepon_ayah')->nullable();
            $table->text('alamat_lengkap_ayah')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            
            // Biodata Diri Ibu
            $table->string('nama_lengkap_ibu');
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('nomor_telepon_ibu')->nullable();
            $table->text('alamat_lengkap_ibu')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            
            // Alamat Lengkap Calon Santri
            $table->string('provinsi')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten_kota')->nullable();
            $table->text('detail_alamat')->nullable();
            
            // Berkas Pendukung
            $table->string('kartu_keluarga')->nullable();
            $table->string('akte_kelahiran')->nullable();
            $table->string('surat_pernyataan_santri')->nullable();
            $table->string('kartu_indonesia_pintar')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_santris');
    }
};

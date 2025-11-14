<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBiodataSantriRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Biodata Calon Santri
            'foto' => ['nullable', 'image', 'max:2048'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tujuan_jenjang_pendidikan' => ['required', 'string', 'max:255'],
            'nisn' => ['nullable', 'string', 'max:255'],
            'nik_calon_santri' => ['nullable', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'anak_ke' => ['nullable', 'integer', 'min:1'],
            'jumlah_bersaudara' => ['nullable', 'integer', 'min:0'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'string', 'max:255'],
            'asal_sekolah' => ['nullable', 'string', 'max:255'],
            'nomor_dan_tahun_ijazah' => ['nullable', 'string', 'max:255'],
            'no_telepon' => ['nullable', 'string', 'max:20'],
            
            // Biodata Diri Ayah
            'nama_lengkap_ayah' => ['required', 'string', 'max:255'],
            'pekerjaan_ayah' => ['nullable', 'string', 'max:255'],
            'nomor_telepon_ayah' => ['nullable', 'string', 'max:20'],
            'alamat_lengkap_ayah' => ['nullable', 'string'],
            'tempat_lahir_ayah' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir_ayah' => ['nullable', 'date'],
            
            // Biodata Diri Ibu
            'nama_lengkap_ibu' => ['required', 'string', 'max:255'],
            'pekerjaan_ibu' => ['nullable', 'string', 'max:255'],
            'nomor_telepon_ibu' => ['nullable', 'string', 'max:20'],
            'alamat_lengkap_ibu' => ['nullable', 'string'],
            'tempat_lahir_ibu' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir_ibu' => ['nullable', 'date'],
            
            // Alamat Lengkap Calon Santri
            'provinsi' => ['nullable', 'string', 'max:255'],
            'kecamatan' => ['nullable', 'string', 'max:255'],
            'kabupaten_kota' => ['nullable', 'string', 'max:255'],
            'detail_alamat' => ['nullable', 'string'],
            
            // Berkas Pendukung
            'kartu_keluarga' => $this->getRequiredFileRule('kartu_keluarga'),
            'akte_kelahiran' => $this->getRequiredFileRule('akte_kelahiran'),
            'surat_pernyataan_santri' => $this->getRequiredFileRule('surat_pernyataan_santri'),
            'kartu_indonesia_pintar' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ];
    }

    /**
     * Check if user has existing biodata
     */
    private function hasExistingBiodata(): bool
    {
        $biodata = Auth::user()->biodataSantri;
        return $biodata !== null;
    }

    /**
     * Check if required file exists in database
     */
    private function hasFileInDatabase(string $field): bool
    {
        $biodata = Auth::user()->biodataSantri;
        return $biodata && !empty($biodata->$field);
    }

    /**
     * Get validation rule for required files
     */
    private function getRequiredFileRule(string $field): array
    {
        $hasExistingBiodata = $this->hasExistingBiodata();
        $hasFile = $this->hasFileInDatabase($field);
        
        // Required if: new biodata OR (existing biodata but no file in database)
        $isRequired = !$hasExistingBiodata || !$hasFile;
        
        $rules = [
            $isRequired ? 'required' : 'nullable',
            'file',
            'mimes:pdf,jpg,jpeg,png',
            'max:2048'
        ];
        
        return $rules;
    }
}

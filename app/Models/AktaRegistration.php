<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AktaRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_anak',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ayah',
        'nama_ibu',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'dokumen_kk_path',
        'dokumen_ktp_ayah_path',
        'dokumen_ktp_ibu_path',
        'dokumen_surat_lahir_path',
        'dokumen_pendukung_path',
        'status',
        'catatan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Get the user that owns the Akta registration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

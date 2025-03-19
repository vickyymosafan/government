<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KkRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_kk',
        'nama_kepala_keluarga',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'jumlah_anggota',
        'dokumen_ktp_path',
        'dokumen_akta_path',
        'dokumen_pendukung_path',
        'status',
        'catatan',
    ];

    /**
     * Get the user that owns the KK registration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

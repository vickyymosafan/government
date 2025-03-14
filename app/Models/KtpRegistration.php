<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KtpRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan',
        'foto_path',
        'dokumen_pendukung_path',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    /**
     * Get the user that owns the KTP registration.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['nama', 'jenis_kelamin', 'sekolah_asal_id', 'nama_orang_tua', 'nomor_telepon_orang_tua', 'tanggal_lahir', 'tempat_lahir', 'agama', 'alamat', 'nomor_telepon', 'nama_orang_tua', 'nomor_telepon_orang_tua','jenjang_bimbel'];

    public $timestamps = false;

    public function sekolahAsal(): BelongsTo
    {
        return $this->belongsTo(SekolahAsal::class);
    }
}

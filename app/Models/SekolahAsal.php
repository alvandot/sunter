<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SekolahAsal extends Model
{
    /** @use HasFactory<\Database\Factories\SekolahAsalFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['nama_sekolah', 'alamat', 'kota', 'provinsi', 'kode_pos', 'nomor_telepon', 'email', 'jenjang'];

    public $timestamps = false;
    public function siswa(): HasMany
    {
        return $this->hasMany(Siswa::class);
    }
}

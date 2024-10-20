<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tentor extends Model
{
    /** @use HasFactory<\Database\Factories\TentorFactory> */
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'no_hp', 'email', 'foto', 'tanggal_lahir', 'tanggal_bergabung', 'mapel_id'];

    public $timestamps = false;

    public function mapel(): BelongsToMany
    {
        return $this->belongsToMany(Mapel::class, 'mapel_tentor');
    }
}

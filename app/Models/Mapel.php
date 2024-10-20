<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Symfony\Component\ErrorHandler\Internal\TentativeTypes;

class Mapel extends Model
{
    /** @use HasFactory<\Database\Factories\MapelFactory> */
    use HasFactory;

    protected $fillable = ['nama_mapel'];

    public $timestamps = false;

    public function tentor(): BelongsToMany
    {
        return $this->belongsToMany(Tentor::class, 'mapel_tentor');
    }
}

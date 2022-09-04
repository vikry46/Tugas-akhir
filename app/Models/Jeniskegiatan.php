<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jeniskegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kegiatan'
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}

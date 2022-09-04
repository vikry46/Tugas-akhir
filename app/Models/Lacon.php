<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lacon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nama','alamat','keterangan'
    ];

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
}

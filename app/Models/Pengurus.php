<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;
    protected $fillable =[
        'kode', 'id_jabatan', 'nama', 'jk','umur','no_hp',
        'image'
    ];
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class,'id_jabatan');
    }

    public function sosial()
    {
        return $this->hasMany(Sosial::class);
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function mesjid()
    {
        return $this->hasMany(Mesjid::class);
    }

    public function yatim()
    {
        return $this->hasMany(Yatim::class);
    }


}

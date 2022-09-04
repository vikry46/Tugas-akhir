<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;


    protected $fillable =[
        'tgl_mulai','tgl_selesai','nama','id_lacon','id_pengurus','keterangan','id_jenis_kegiatan','id_penceramah'
    ];
    
    public function lacon()
    {
        return $this->belongsTo(Lacon::class,'id_lacon');
    }

    public function penceramah()
    {
        return $this->belongsTo(Lacon::class,'id_penceramah');
    }

    public function jeniskegiatan()
    {
        return $this->belongsTo(Jeniskegiatan::class,'id_jenis_kegiatan');
    }

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class,'id_pengurus');
    }
}

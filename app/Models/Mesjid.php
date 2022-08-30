<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesjid extends Model
{
    use HasFactory;
    protected $fillable=[
        'tgl','id_pengurus','pemasukan','pengeluaran','keterangan'
    ];
    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'id_pengurus');
    }
}

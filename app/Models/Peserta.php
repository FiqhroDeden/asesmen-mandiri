<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_pilihan');
    }

    public function formulirAplikasiRpl()
    {
        return $this->hasMany(FormulirAplikasiRpl::class, 'no_peserta', 'no_peserta');
    }

    public function asesmenPrestasi()
    {
        return $this->belongsTo(AsesmenPrestasi::class, 'no_peserta', 'no_peserta');
    }

    public function beritaAcara()
    {
        return $this->hasOne(BeritaAcaraAsesmen::class, 'no_peserta', 'no_peserta');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerolehanSks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function formulir_evaluasi_rpl()
    {
        return $this->belongsTo(FormulirAplikasiRpl::class);
    }
    public function cpm()
    {
        return $this->belongsTo(CapaianPembelajaran::class);
    }

    public function buktiPerolehanSks()
    {
        return $this->hasMany(BuktiPerolehanSks::class);
    }
}

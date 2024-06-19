<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirAplikasiRpl extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function matakuliah(){
        return $this->belongsTo(Matakuliah::class);
    }

    public function transferSks(){
        return $this->hasOne(TransferSks::class);
    }
    public function perolehanSks()
    {
        return $this->hasMany(PerolehanSks::class);
    }

    public function nilaiPerolehanSks()
    {
        return $this->hasOne(NilaiPerolehanSks::class);
    }
}

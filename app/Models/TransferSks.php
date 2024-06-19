<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferSks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buktiTransferSks()
    {
        return $this->hasMany(BuktiTransferSks::class);
    }

    public function formulirAplikasiRpl()
    {
        return $this->belongsTo(FormulirAplikasiRpl::class);
    }

    public function nilaiTransferSks()
    {
        return $this->hasOne(NilaiTransferSks::class);
    }
}

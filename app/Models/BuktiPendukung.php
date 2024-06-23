<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPendukung extends Model
{
    use HasFactory;

    public function buktiTransferSks()
    {
        return $this->hasMany(BuktiTransferSks::class);
    }

    public function buktiPerolehanSks()
    {
        return $this->hasMany(BuktiPerolehanSks::class);
    }
}

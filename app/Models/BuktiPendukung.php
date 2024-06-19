<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPendukung extends Model
{
    use HasFactory;

    public function transferSks()
    {
        return $this->hasMany(TransferSks::class);
    }

    public function perolehanSks()
    {
        return $this->hasMany(PerolehanSks::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuktiPerolehanSks extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function buktiPendukung()
    {
        return $this->belongsTo(BuktiPendukung::class);
    }
}

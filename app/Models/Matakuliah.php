<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matakuliah extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function cpm()
    {
        return $this->hasMany(CapaianPembelajaran::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHidupForm extends Model
{
    use HasFactory;

    public function fields()
    {
        return $this->hasMany(RiwayatHidupFormField::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHidupFormField extends Model
{
    use HasFactory;

    public function riwayatHidup()
    {
        return $this->hasMany(RiwayatHidup::class, 'riwayat_hidup_form_field_id');
    }
}

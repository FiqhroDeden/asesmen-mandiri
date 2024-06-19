<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatHidup extends Model
{
    use HasFactory;
    public function formField()
    {
        return $this->belongsTo(RiwayatHidupFormField::class, 'riwayat_hidup_form_field_id');
    }
}

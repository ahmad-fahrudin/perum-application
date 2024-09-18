<?php

namespace App\Models;

use App\Models\Rumah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penghuni extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
}

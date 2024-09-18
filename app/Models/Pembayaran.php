<?php

namespace App\Models;

use App\Models\Iuran;
use App\Models\Rumah;
use App\Models\Penghuni;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rumah()
    {
        return $this->belongsTo(Rumah::class);
    }
    public function penghuni()
    {
        return $this->belongsTo(Penghuni::class);
    }
    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }
}

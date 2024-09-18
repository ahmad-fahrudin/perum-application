<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPenghuni extends Model
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
}

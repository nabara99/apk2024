<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tps extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_tps',
        'desa_id',
        'absen,'
    ];

    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dpt extends Model
{
    use HasFactory;

    protected $fillable =[
        'no_kk',
        'nik',
        'nama',
        'tl',
        'tgl_lahir',
        'status',
        'jenkel',
        'alamat',
        'rt',
        'rw',
        'disabilitas',
        'ektp',
        'memilih',
        'hadir',
        'tps_id',
    ];

    public function tps()
    {
        return $this->belongsTo(Tps::class);
    }
}

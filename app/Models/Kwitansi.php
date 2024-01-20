<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kw_id',
        'tgl',
        'hal',
        'nilai',
        'ppn',
        'pph21',
        'pph22',
        'pph23',
        'pdaerah',
        'sisa',
        'penerima_id',
    ];
}

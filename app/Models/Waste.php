<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{
    use HasFactory;
    protected $table = 'sampahs';
    protected $guarded = 'id';

    protected $fillable = [
        'jenis_sampah',
        'berat',
        'harga',
        'total_harga'
    ];
}

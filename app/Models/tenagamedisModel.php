<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenagamedisModel extends Model
{
    use HasFactory;
    protected $table = "data_tenaga_medis";
    protected $primaryKey = "kode_kamar";
    protected $guarded = [];
    protected $fillable = [
        'id_tenagamedis',
        'Nama_Tenagamedis',
    ];
}

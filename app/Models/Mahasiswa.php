<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{

    use HasFactory;
//    mendefine kolom mana saja yang dapat diisi oleh data/ dilakukan manipulasi data
    protected $fillable = ['nim', 'nama', 'alamat', 'tgl_lahir', 'gender', 'usia'];
}

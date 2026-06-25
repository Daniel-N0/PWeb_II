<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['nama_member', 'nomor_member', 'alamat', 'tgl_mendaftar', 'tgl_terakhir_bayar'];
}
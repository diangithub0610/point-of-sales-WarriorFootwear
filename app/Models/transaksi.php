<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $table="transaksi";
    protected $primaryKey="kode_transaksi";
    protected $guard="kode_transaksi";
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table="barang";

    protected $primaryKey="kode_barang";

    protected $fillable =["nama_barang","harga","deskripsi","stok","kategori","warna","ukuran","gambar"];

}

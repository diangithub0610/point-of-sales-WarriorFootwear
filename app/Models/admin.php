<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;

    //menentukan nama tabel
    protected $table="admin";

    //menentukan primary key
    protected $primaryKey="id_admin";

    //melindungi agar kolom tidak bisa diisi
    protected $guard ="id_admin";

    //untuk menyembunyikan kolom
    protected $hidden ="kata_sandi_admin";
    
}

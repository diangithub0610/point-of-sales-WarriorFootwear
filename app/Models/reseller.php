<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reseller extends Model
{
    use HasFactory;
    protected $table="reseller";
    protected $primaryKey= "id_reseller";
    protected $hidden="kata_sandi_reseller";
}

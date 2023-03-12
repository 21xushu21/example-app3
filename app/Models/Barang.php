<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table='barang';
    // protected $fillable=['nama','email','no_hp','alamat'];
    protected $guarded =[];
}

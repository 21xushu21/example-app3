<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\LogHelper;

class Konsumen extends Model
{
    use HasFactory;
protected $table='konsumen';
// protected $fillable=['nama','email','no_hp','alamat'];
protected $guarded =[];
}

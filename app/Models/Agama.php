<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    protected $table = 'agamas'; // sesuaikan dengan nama tabel di DB
    protected $fillable = ['nama'];
}

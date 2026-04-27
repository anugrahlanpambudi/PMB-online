<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',

        'alamat_ktp',
        'alamat_sekarang',
        'kecamatan_id',
        'kabupaten_id',
        'provinsi_id',
        'telp',
        'kewarganegaraan',
        'tanggal_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'status',
        'agama_id',
        'foto'
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}

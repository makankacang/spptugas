<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = 'petugas';
    protected $primaryKey = 'id_petugas';
    public $timestamps = false; // Assuming 'petugas' table doesn't have timestamps
    protected $fillable = ['id_petugas', 'username', 'password', 'nama_petugas', 'level'];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'id_petugas', 'id_petugas');
    }

    // Add other relationships as needed
}

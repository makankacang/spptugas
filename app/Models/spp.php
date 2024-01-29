<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spp extends Model
{
    protected $table = 'spp';
    protected $primaryKey = 'id_spp';
    public $timestamps = false; // Assuming 'spp' table doesn't have timestamps
    protected $fillable = ['id_spp', 'tahun', 'nominal', 'semester'];

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'id_siswa');
    }

    public function siswas()
    {
        return $this->hasMany(siswa::class, 'id_spp');
    }

    public function spp()
    {
        return $this->hasMany(pembayaran::class, 'id_spp');
    }

    // Add other relationships as needed
}

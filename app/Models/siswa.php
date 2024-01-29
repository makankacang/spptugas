<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'nisn';
    public $incrementing = false; // Assuming 'nisn' is not an auto-incrementing field
    public $timestamps = false;
    protected $fillable = ['nisn', 'nis', 'nama', 'id_kelas', 'alamat', 'no_telp', 'id_spp'];
    protected $guarded = ['created_at', 'updated_at'];

    public function kelas()
    {
        return $this->belongsTo(kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->hasOne(spp::class, 'id_siswa');
    }

    public function histori()
    {
        return $this->hasMany(histori::class, 'id_pembayaran');
    }

    public function sppp()
    {
        return $this->belongsTo(spp::class, 'id_spp');
    }

    // Add other relationships as needed
}

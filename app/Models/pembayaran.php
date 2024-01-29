<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $guarded = ['created_at', 'updated_at'];
    protected $primaryKey = 'id_pembayaran';
    protected $fillable = ['id_pembayaran', 'admin', 'nisn', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar', 'id_spp', 'semester'];



    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(kelas::class, 'id_spp');
    }

    // Add other relationships as needed
}

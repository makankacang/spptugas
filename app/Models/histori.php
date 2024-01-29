<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    use HasFactory;
    protected $table = 'histori';
    protected $primaryKey = 'id_pembayaran';
    protected $guarded = ['updated_at'];
    protected $fillable = ['id_pembayaran', 'admin', 'nisn', 'tgl_bayar', 'bulan_dibayar', 'tahun_dibayar','jumlah_bayar', 'id_spp', 'semester','created_at','updated_at'];



    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'nisn');
    }

    public function siswas()
    {
        return $this->belongsTo(siswa::class, 'nisn');
    }

    public function spp()
    {
        return $this->belongsTo(kelas::class, 'id_spp');
    }

    // Add other relationships as needed
}

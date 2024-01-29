<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    public $timestamps = false; // Assuming 'kelas' table doesn't have timestamps
    protected $fillable = ['id_kelas', 'nama_kelas', 'kompetensi_keahlian'];
    protected $guarded = ['created_at', 'updated_at'];

    public function siswa()
    {
        return $this->hasMany(siswa::class, 'id_kelas');
    }

    // Add other relationships as needed
}

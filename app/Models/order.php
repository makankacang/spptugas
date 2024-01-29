<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class order extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'nofaktur';
    public $timestamps = false;
    protected $guarded = ['created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo(customer::class, 'idc');
    }
}

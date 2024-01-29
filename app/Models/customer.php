<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'idc';
    public $timestamps = false;
    protected $guarded = ['created_at', 'updated_at'];

    public function order()
    {
        return $this->hasMany(order::class, 'idc');
    }
}


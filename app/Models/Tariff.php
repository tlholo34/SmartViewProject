<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = ['tenant_id', 'name', 'rate', 'is_peak', 'start_time', 'end_time'];

    protected $casts = [
        'rate' => 'decimal:4',
        'is_peak' => 'boolean',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

}

<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterReading extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = ['tenant','meter_id', 'reading_time', 'value'];

    protected $casts = [
        'reading_time' => 'datetime',
        'value' => 'decimal:2',
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }
}

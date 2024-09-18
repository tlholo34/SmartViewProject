<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConsumptionData extends Model
{
    use HasFactory, BelongsToTenant ;

    protected $fillable = [
        'meter_id',
        'date',
        'daily_consumption',
        'monthly_consumption',
        'yearly_consumption'
    ];

    protected $casts = [
        'date' => 'date',
        'daily_consumption' => 'decimal:2',
        'monthly_consumption' => 'decimal:2',
        'yearly_consumption' => 'decimal:2',
    ];

    public function meter(): BelongsTo
    {
        return $this->belongsTo(Meter::class);
    }
}

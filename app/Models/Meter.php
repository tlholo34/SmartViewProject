<?php

namespace App\Models;

use App\Traits\BelongsToTenant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = ['tenant_id', 'meter_number', 'type'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function readings()
    {
        return $this->hasMany(MeterReading::class);
    }

    public function consumptionData()
    {
        return $this->hasMany(ConsumptionData::class);
    }
}

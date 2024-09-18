<?php

namespace App\Repositories;


use App\Models\ConsumptionData;
use App\Repositories\Contracts\ConsumptionRepositoryInterface;

class ConsumptionRepository implements ConsumptionRepositoryInterface
{
    public function getDailyConsumption(int $meterId): ?array
    {
        return ConsumptionData::where('meter_id', $meterId)
            ->whereDate('date', now()->toDateString())
            ->first()
            ->toArray();
    }

    public function getMonthlyConsumption(int $meterId): ?array
    {
        return ConsumptionData::where('meter_id', $meterId)
            ->whereYear('date', now()->year)
            ->whereMonth('date', now()->month)
            ->first()
            ->toArray();
    }

    public function getYearlyConsumption(int $meterId): ?array
    {
        return ConsumptionData::where('meter_id', $meterId)
            ->whereYear('date', now()->year)
            ->first()
            ->toArray();
    }

    /**
     * Update or create daily consumption data for a given meter.
     *
     * @param int $meterId
     * @param string $date
     * @param float $consumption
     * @return ConsumptionData
     */
    public function updateOrCreateDailyConsumption(int $meterId, string $date, float $consumption): ConsumptionData
    {
        return ConsumptionData::updateOrCreate(
            [
                'meter_id' => $meterId,
                'date'     => $date,
            ],
            [
                'consumption' => $consumption,
            ]
        );
    }
}

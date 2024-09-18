<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface ConsumptionRepositoryInterface
{
    public function getDailyConsumption(int $meterId): ?array;
    public function getMonthlyConsumption(int $meterId): ?array;
    public function getYearlyConsumption(int $meterId): ?array;
}

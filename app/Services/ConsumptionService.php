<?php
namespace App\Services;

use App\Jobs\ProcessDailyConsumptionJob;
use App\Repositories\Contracts\ConsumptionRepositoryInterface;


class ConsumptionService
{
    protected $consumptionRepository;

    public function __construct(ConsumptionRepositoryInterface $consumptionRepository)
    {
        $this->consumptionRepository = $consumptionRepository;
    }

    public function getDailyConsumption(int $meterId)
    {
        return $this->consumptionRepository->getDailyConsumption($meterId);
    }

    public function getMonthlyConsumption(int $meterId)
    {
        return $this->consumptionRepository->getMonthlyConsumption($meterId);
    }

    public function getYearlyConsumption(int $meterId)
    {
        return $this->consumptionRepository->getYearlyConsumption($meterId);
    }

    public function handleDailyConsumption(int $meterId, string $date, float $consumption): void
    {
        ProcessDailyConsumptionJob::dispatch($meterId, $date, $consumption);
    }
}

<?php

namespace App\Jobs;

use App\Repositories\Contracts\ConsumptionRepositoryInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessDailyConsumptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $meterId;
    protected string $date;
    protected float $consumption;

    public function __construct(int $meterId, string $date, float $consumption)
    {
        $this->meterId = $meterId;
        $this->date = $date;
        $this->consumption = $consumption;
    }

    public function handle(ConsumptionRepositoryInterface $consumptionRepository): void
    {
        $consumptionRepository->updateOrCreateDailyConsumption($this->meterId, $this->date, $this->consumption);
    }
}

<?php

namespace App\Repositories;

use App\Models\Meter;
use App\Models\MeterReading;
use App\Models\ConsumptionData;
use App\Repositories\Contracts\MeterRepositoryInterface;
use App\Repositories\Contracts\ConsumptionRepositoryInterface;
use Illuminate\Support\Collection;

class MeterRepository implements MeterRepositoryInterface
{
    public function getAllMeters(): Collection
    {
        return Meter::all();
    }

    public function create(array $data): Meter
    {
        return Meter::create($data);
    }

    public function find($id): ?Meter
    {
        return Meter::find($id);
    }

    public function update($id, array $data): ?Meter
    {
        $meter = $this->find($id);
        if ($meter) {
            $meter->update($data);
        }
        return $meter;
    }

    public function delete($id): void
    {
        Meter::destroy($id);
    }
}

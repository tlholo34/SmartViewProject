<?php
namespace App\Services;

use App\Repositories\Contracts\MeterRepositoryInterface;

class MeterService
{
    protected $meterRepository;

    public function __construct(MeterRepositoryInterface $meterRepository)
    {
        $this->meterRepository = $meterRepository;
    }

    public function getAllMeters()
    {
        return $this->meterRepository->getAllMeters();
    }

    public function createMeter(array $data)
    {
        return $this->meterRepository->create($data);
    }

    public function getMeterById($id)
    {
        return $this->meterRepository->find($id);
    }

    public function updateMeter($id, array $data)
    {
        return $this->meterRepository->update($id, $data);
    }

    public function deleteMeter($id)
    {
        $this->meterRepository->delete($id);
    }
}

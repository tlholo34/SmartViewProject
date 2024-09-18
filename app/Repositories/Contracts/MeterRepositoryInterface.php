<?php

namespace App\Repositories\Contracts;

use Illuminate\Support\Collection;

interface MeterRepositoryInterface
{
    public function getAllMeters(): Collection;
    public function create(array $data);
    public function find($id);
    public function update($id, array $data);
    public function delete($id);
}

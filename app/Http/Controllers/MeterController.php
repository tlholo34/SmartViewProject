<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\MeterRepositoryInterface;
use App\Services\MeterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MeterController extends Controller
{
    protected MeterService $meterService;

    public function __construct(MeterService $meterService)
    {
        $this->meterService = $meterService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json($this->meterService->getAllMeters());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|unique:meters',
            'location' => 'required',
        ]);

        $meter = $this->meterService->createMeter($request->only(['serial_number', 'location']));

        return response()->json($meter, 201);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $meter = $this->meterService->getMeterById($id);

        if (!$meter) {
            return response()->json(['error' => 'Meter not found'], 404);
        }

        return response()->json($meter);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'serial_number' => 'required|unique:meters,serial_number,' . $id,
            'location' => 'required',
        ]);

        $meter = $this->meterService->updateMeter($id, $request->only(['serial_number', 'location']));

        return response()->json($meter);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->meterService->deleteMeter($id);

        return response()->json(null, 204);
    }
}

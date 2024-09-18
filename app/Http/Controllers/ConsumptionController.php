<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\MeterDataService;
use App\Repositories\Contracts\ConsumptionRepositoryInterface;
use App\Repositories\Contracts\MeterRepositoryInterface;
use App\Services\ConsumptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ConsumptionController extends Controller
{
    protected $consumptionService;

    public function __construct(ConsumptionService $consumptionService)
    {
        $this->consumptionService = $consumptionService;
    }

    /**
     * Dispatch a job to process daily consumption data for a meter.
     */
    public function processDailyConsumption(Request $request): JsonResponse
    {
        $request->validate([
            'meter_id' => 'required|exists:meters,id',
            'consumption' => 'required|numeric'
        ]);

        $date = now()->toDateString();
        $this->consumptionService->handleDailyConsumption($request->meter_id, $date, $request->consumption);

        return response()->json(['message' => 'Daily consumption processing initiated.'], 202);
    }


    public function daily(Request $request): JsonResponse
    {
        $request->validate(['meter_id' => 'required|exists:meters,id']);

        $consumption = $this->consumptionService->getDailyConsumption($request->meter_id);

        return response()->json($consumption);
    }

    public function monthly(Request $request): JsonResponse
    {
        $request->validate(['meter_id' => 'required|exists:meters,id']);

        $consumption = $this->consumptionService->getMonthlyConsumption($request->meter_id);

        return response()->json($consumption);
    }

    public function yearly(Request $request): JsonResponse
    {
        $request->validate(['meter_id' => 'required|exists:meters,id']);

        $consumption = $this->consumptionService->getYearlyConsumption($request->meter_id);

        return response()->json($consumption);
    }
}

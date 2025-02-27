<?php

namespace App\Http\Controllers;

use App\Models\Fuel;
use Illuminate\Http\Request;
use App\Services\FuelService;
use App\Http\Resources\FuelResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\FuelRequest\StoreFuelRequest;
use App\Http\Requests\FuelRequest\UpdateFuelRequest;

class FuelController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var FuelService
     */
    protected $FuelService;

    /**
     *  FuelController constructor
     * @param FuelService $FuelService
     */
    public function __construct(FuelService $FuelService){
        $this->FuelService = $FuelService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Fuels = $this->FuelService->listFuel($perPage);
        return $this->resourcePaginated(FuelResource::collection($Fuels));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFuelRequest $request)
    {
        $fieldInputs = $request->validated();
        $Fuel    = $this->FuelService->createFuel($fieldInputs);
        return $this->successResponse(new FuelResource($Fuel), "Fuel Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fuel $Fuel)
    {
        return $this->successResponse(new FuelResource($Fuel));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFuelRequest $request, Fuel $Fuel)
    {
        $fieldInputs = $request->validated();
        $Fuel    = $this->FuelService->updateFuel($fieldInputs, $Fuel);
        return $this->successResponse(new FuelResource($Fuel), "Fuel Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fuel $Fuel)
    {
        $this->FuelService->deleteFuel($Fuel);
        return $this->successResponse(null, "Fuel Deleted Successfully");
    }




}
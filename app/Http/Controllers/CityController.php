<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Http\Resources\CityResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\CityRequest\StoreCityRequest;
use App\Http\Requests\CityRequest\UpdateCityRequest;

class CityController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var CityService
     */
    protected $CityService;

    /**
     *  CityController constructor
     * @param CityService $CityService
     */
    public function __construct(CityService $CityService){
        $this->CityService = $CityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Cities = $this->CityService->listCity($perPage);
        return $this->resourcePaginated(CityResource::collection($Cities));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $fieldInputs = $request->validated();
        $City    = $this->CityService->createCity($fieldInputs);
        return $this->successResponse(new CityResource($City), "City Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $City)
    {
        return $this->successResponse(new CityResource($City));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $City)
    {
        $fieldInputs = $request->validated();
        $City    = $this->CityService->updateCity($fieldInputs, $City);
        return $this->successResponse(new CityResource($City), "City Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $City)
    {
        $this->CityService->deleteCity($City);
        return $this->successResponse(null, "City Deleted Successfully");
    }




}
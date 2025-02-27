<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Services\CarService;
use App\Http\Resources\CarResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\CarRequest\StoreCarRequest;
use App\Http\Requests\CarRequest\UpdateCarRequest;

class CarController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var CarService
     */
    protected $CarService;

    /**
     *  CarController constructor
     * @param CarService $CarService
     */
    public function __construct(CarService $CarService){
        $this->CarService = $CarService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Cars = $this->CarService->listCar($perPage);
        return $this->resourcePaginated(CarResource::collection($Cars));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCarRequest $request)
    {
        $fieldInputs = $request->validated();
        $Car    = $this->CarService->createCar($fieldInputs);
        return $this->successResponse(new CarResource($Car), "Car Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $Car)
    {
        return $this->successResponse(new CarResource($Car));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCarRequest $request, Car $Car)
    {
        $fieldInputs = $request->validated();
        $Car    = $this->CarService->updateCar($fieldInputs, $Car);
        return $this->successResponse(new CarResource($Car), "Car Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $Car)
    {
        $this->CarService->deleteCar($Car);
        return $this->successResponse(null, "Car Deleted Successfully");
    }




}
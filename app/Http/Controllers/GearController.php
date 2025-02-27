<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;
use App\Services\GearService;
use App\Http\Resources\GearResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\GearRequest\StoreGearRequest;
use App\Http\Requests\GearRequest\UpdateGearRequest;

class GearController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var GearService
     */
    protected $GearService;

    /**
     *  GearController constructor
     * @param GearService $GearService
     */
    public function __construct(GearService $GearService){
        $this->GearService = $GearService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Gears = $this->GearService->listGear($perPage);
        return $this->resourcePaginated(GearResource::collection($Gears));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGearRequest $request)
    {
        $fieldInputs = $request->validated();
        $Gear    = $this->GearService->createGear($fieldInputs);
        return $this->successResponse(new GearResource($Gear), "Gear Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gear $Gear)
    {
        return $this->successResponse(new GearResource($Gear));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGearRequest $request, Gear $Gear)
    {
        $fieldInputs = $request->validated();
        $Gear    = $this->GearService->updateGear($fieldInputs, $Gear);
        return $this->successResponse(new GearResource($Gear), "Gear Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gear $Gear)
    {
        $this->GearService->deleteGear($Gear);
        return $this->successResponse(null, "Gear Deleted Successfully");
    }




}
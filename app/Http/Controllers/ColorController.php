<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use App\Services\ColorService;
use App\Http\Resources\ColorResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\ColorRequest\StoreColorRequest;
use App\Http\Requests\ColorRequest\UpdateColorRequest;

class ColorController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var ColorService
     */
    protected $ColorService;

    /**
     *  ColorController constructor
     * @param ColorService $ColorService
     */
    public function __construct(ColorService $ColorService){
        $this->ColorService = $ColorService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Colors = $this->ColorService->listColor($perPage);
        return $this->resourcePaginated(ColorResource::collection($Colors));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        $fieldInputs = $request->validated();
        $Color    = $this->ColorService->createColor($fieldInputs);
        return $this->successResponse(new ColorResource($Color), "Color Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $Color)
    {
        return $this->successResponse(new ColorResource($Color));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $Color)
    {
        $fieldInputs = $request->validated();
        $Color    = $this->ColorService->updateColor($fieldInputs, $Color);
        return $this->successResponse(new ColorResource($Color), "Color Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $Color)
    {
        $this->ColorService->deleteColor($Color);
        return $this->successResponse(null, "Color Deleted Successfully");
    }




}
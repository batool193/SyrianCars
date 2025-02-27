<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Http\Resources\BrandResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\BrandRequest\StoreBrandRequest;
use App\Http\Requests\BrandRequest\UpdateBrandRequest;

class BrandController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var BrandService
     */
    protected $BrandService;

    /**
     *  BrandController constructor
     * @param BrandService $BrandService
     */
    public function __construct(BrandService $BrandService){
        $this->BrandService = $BrandService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Brands = $this->BrandService->listBrand($perPage);
        return $this->resourcePaginated(BrandResource::collection($Brands));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $fieldInputs = $request->validated();
        $Brand    = $this->BrandService->createBrand($fieldInputs);
        return $this->successResponse(new BrandResource($Brand), "Brand Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $Brand)
    {
        return $this->successResponse(new BrandResource($Brand));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $Brand)
    {
        $fieldInputs = $request->validated();
        $Brand    = $this->BrandService->updateBrand($fieldInputs, $Brand);
        return $this->successResponse(new BrandResource($Brand), "Brand Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $Brand)
    {
        $this->BrandService->deleteBrand($Brand);
        return $this->successResponse(null, "Brand Deleted Successfully");
    }




}
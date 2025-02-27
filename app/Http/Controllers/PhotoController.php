<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use App\Services\PhotoService;
use App\Http\Resources\PhotoResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\PhotoRequest\StorePhotoRequest;
use App\Http\Requests\PhotoRequest\UpdatePhotoRequest;

class PhotoController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var PhotoService
     */
    protected $PhotoService;

    /**
     *  PhotoController constructor
     * @param PhotoService $PhotoService
     */
    public function __construct(PhotoService $PhotoService){
        $this->PhotoService = $PhotoService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Photos = $this->PhotoService->listPhoto($perPage);
        return $this->resourcePaginated(PhotoResource::collection($Photos));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        $fieldInputs = $request->validated();
        $Photo    = $this->PhotoService->createPhoto($fieldInputs);
        return $this->successResponse(new PhotoResource($Photo), "Photo Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $Photo)
    {
        return $this->successResponse(new PhotoResource($Photo));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $Photo)
    {
        $fieldInputs = $request->validated();
        $Photo    = $this->PhotoService->updatePhoto($fieldInputs, $Photo);
        return $this->successResponse(new PhotoResource($Photo), "Photo Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $Photo)
    {
        $this->PhotoService->deletePhoto($Photo);
        return $this->successResponse(null, "Photo Deleted Successfully");
    }




}
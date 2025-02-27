<?php

namespace App\Http\Controllers;

use App\Models\model;
use Illuminate\Http\Request;
use App\Services\modelService;
use App\Http\Resources\modelResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\modelRequest\StoremodelRequest;
use App\Http\Requests\modelRequest\UpdatemodelRequest;

class ModelController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var modelService
     */
    protected $modelService;

    /**
     *  modelController constructor
     * @param modelService $modelService
     */
    public function __construct(modelService $modelService){
        $this->modelService = $modelService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $models = $this->modelService->listmodel($perPage);
        return $this->resourcePaginated(modelResource::collection($models));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremodelRequest $request)
    {
        $fieldInputs = $request->validated();
        $model    = $this->modelService->createmodel($fieldInputs);
        return $this->successResponse(new modelResource($model), "model Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(model $model)
    {
        return $this->successResponse(new modelResource($model));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemodelRequest $request, model $model)
    {
        $fieldInputs = $request->validated();
        $model    = $this->modelService->updatemodel($fieldInputs, $model);
        return $this->successResponse(new modelResource($model), "model Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(model $model)
    {
        $this->modelService->deletemodel($model);
        return $this->successResponse(null, "model Deleted Successfully");
    }




}

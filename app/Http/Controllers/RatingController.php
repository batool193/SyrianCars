<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Services\RatingService;
use App\Http\Resources\RatingResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\RatingRequest\StoreRatingRequest;
use App\Http\Requests\RatingRequest\UpdateRatingRequest;

class RatingController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var RatingService
     */
    protected $RatingService;

    /**
     *  RatingController constructor
     * @param RatingService $RatingService
     */
    public function __construct(RatingService $RatingService){
        $this->RatingService = $RatingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Ratings = $this->RatingService->listRating($perPage);
        return $this->resourcePaginated(RatingResource::collection($Ratings));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        $fieldInputs = $request->validated();
        $Rating    = $this->RatingService->createRating($fieldInputs);
        return $this->successResponse(new RatingResource($Rating), "Rating Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $Rating)
    {
        return $this->successResponse(new RatingResource($Rating));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $Rating)
    {
        $fieldInputs = $request->validated();
        $Rating    = $this->RatingService->updateRating($fieldInputs, $Rating);
        return $this->successResponse(new RatingResource($Rating), "Rating Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $Rating)
    {
        $this->RatingService->deleteRating($Rating);
        return $this->successResponse(null, "Rating Deleted Successfully");
    }




}
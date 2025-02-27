<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use App\Http\Resources\SocialAccountResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\SocialAccountRequest\StoreSocialAccountRequest;
use App\Http\Requests\SocialAccountRequest\UpdateSocialAccountRequest;

class SocialAccountController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var SocialAccountService
     */
    protected $SocialAccountService;

    /**
     *  SocialAccountController constructor
     * @param SocialAccountService $SocialAccountService
     */
    public function __construct(SocialAccountService $SocialAccountService){
        $this->SocialAccountService = $SocialAccountService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $SocialAccounts = $this->SocialAccountService->listSocialAccount($perPage);
        return $this->resourcePaginated(SocialAccountResource::collection($SocialAccounts));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSocialAccountRequest $request)
    {
        $fieldInputs = $request->validated();
        $SocialAccount    = $this->SocialAccountService->createSocialAccount($fieldInputs);
        return $this->successResponse(new SocialAccountResource($SocialAccount), "SocialAccount Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialAccount $SocialAccount)
    {
        return $this->successResponse(new SocialAccountResource($SocialAccount));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSocialAccountRequest $request, SocialAccount $SocialAccount)
    {
        $fieldInputs = $request->validated();
        $SocialAccount    = $this->SocialAccountService->updateSocialAccount($fieldInputs, $SocialAccount);
        return $this->successResponse(new SocialAccountResource($SocialAccount), "SocialAccount Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialAccount $SocialAccount)
    {
        $this->SocialAccountService->deleteSocialAccount($SocialAccount);
        return $this->successResponse(null, "SocialAccount Deleted Successfully");
    }




}
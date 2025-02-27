<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Resources\UserResource;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use App\Http\Requests\UserRequest\StoreUserRequest;
use App\Http\Requests\UserRequest\UpdateUserRequest;

class UserController extends Controller
{
    use ApiResponseTrait;

    /**
     * @var UserService
     */
    protected $UserService;

    /**
     *  UserController constructor
     * @param UserService $UserService
     */
    public function __construct(UserService $UserService){
        $this->UserService = $UserService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10); // Default to 10 if not provided
        $Users = $this->UserService->listUser($perPage);
        return $this->resourcePaginated(UserResource::collection($Users));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $fieldInputs = $request->validated();
        $User    = $this->UserService->createUser($fieldInputs);
        return $this->successResponse(new UserResource($User), "User Created Successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        return $this->successResponse(new UserResource($User));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $User)
    {
        $fieldInputs = $request->validated();
        $User    = $this->UserService->updateUser($fieldInputs, $User);
        return $this->successResponse(new UserResource($User), "User Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        $this->UserService->deleteUser($User);
        return $this->successResponse(null, "User Deleted Successfully");
    }




}
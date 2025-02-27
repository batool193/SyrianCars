<?php

namespace App\Services;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Users information
     */
    public function listUser(int $perPage) {
        try {
            return User::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing User '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new User.
     * @param array $fieldInputs
     * @return \App\Models\User
     */
    public function createUser(array $fieldInputs)
    {
        try{
            return User::create([
                    'first_name' => $fieldInputs["first_name"],
                    'last_name' => $fieldInputs["last_name"],
                    'email' => $fieldInputs["email"],
                    'password' => $fieldInputs["password"],
                    'phone' => $fieldInputs["phone"],
                    'city_id' => $fieldInputs["city_id"],
                    'birthdate' => $fieldInputs["birthdate"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating User: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific User.
     *
     * @param \App\Models\User $User
     * @return \App\Models\User
     */
    public function getUser(User $User)
    {
        try {
            return $User;
        } catch (Exception $e) {
            Log::error('Error retrieving User: ' . $e->getMessage());
            throw new Exception('Error retrieving User.');
        }
    }

    /**
     * Update a specific User.
     *
     * @param array $fieldInputs
     * @param User $User
     * @return \App\Models\User
     */
    public function updateUser(array $fieldInputs, $User) {
        try {
            $data = [
                    "first_name" => $fieldInputs["first_name"],
                    "last_name" => $fieldInputs["last_name"],
                    "email" => $fieldInputs["email"],
                    "phone" => $fieldInputs["phone"],
                    "city_id" => $fieldInputs["city_id"],
                    "birthdate" => $fieldInputs["birthdate"],
        ];
            $User->update(array_filter($data));
            return $User;
        } catch (Exception $e) {
            Log::error('Error updating User: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific User.
     *
     * @param User $User
     * @return void
     */
    public function deleteUser($User){
        try {
            $User->delete();
        } catch (Exception $e) {
            Log::error('Error deleting User '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
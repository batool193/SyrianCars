<?php

namespace App\Services;

use Exception;
use App\Models\City;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CityService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Cities information
     */
    public function listCity(int $perPage) {
        try {
            return City::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing City '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new City.
     * @param array $fieldInputs
     * @return \App\Models\City
     */
    public function createCity(array $fieldInputs)
    {
        try{
            return City::create([
                    'name' => $fieldInputs["name"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating City: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific City.
     *
     * @param \App\Models\City $City
     * @return \App\Models\City
     */
    public function getCity(City $City)
    {
        try {
            return $City;
        } catch (Exception $e) {
            Log::error('Error retrieving City: ' . $e->getMessage());
            throw new Exception('Error retrieving City.');
        }
    }

    /**
     * Update a specific City.
     *
     * @param array $fieldInputs
     * @param City $City
     * @return \App\Models\City
     */
    public function updateCity(array $fieldInputs, $City) {
        try {
            $data = [
                    "name" => $fieldInputs["name"],
        ];
            $City->update(array_filter($data));
            return $City;
        } catch (Exception $e) {
            Log::error('Error updating City: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific City.
     *
     * @param City $City
     * @return void
     */
    public function deleteCity($City){
        try {
            $City->delete();
        } catch (Exception $e) {
            Log::error('Error deleting City '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
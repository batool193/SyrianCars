<?php

namespace App\Services;

use Exception;
use App\Models\Fuel;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FuelService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Fuels information
     */
    public function listFuel(int $perPage) {
        try {
            return Fuel::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Fuel '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Fuel.
     * @param array $fieldInputs
     * @return \App\Models\Fuel
     */
    public function createFuel(array $fieldInputs)
    {
        try{
            return Fuel::create([
                    'fuel_type' => $fieldInputs["fuel_type"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Fuel: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Fuel.
     *
     * @param \App\Models\Fuel $Fuel
     * @return \App\Models\Fuel
     */
    public function getFuel(Fuel $Fuel)
    {
        try {
            return $Fuel;
        } catch (Exception $e) {
            Log::error('Error retrieving Fuel: ' . $e->getMessage());
            throw new Exception('Error retrieving Fuel.');
        }
    }

    /**
     * Update a specific Fuel.
     *
     * @param array $fieldInputs
     * @param Fuel $Fuel
     * @return \App\Models\Fuel
     */
    public function updateFuel(array $fieldInputs, $Fuel) {
        try {
            $data = [
                    "fuel_type" => $fieldInputs["fuel_type"],
        ];
            $Fuel->update(array_filter($data));
            return $Fuel;
        } catch (Exception $e) {
            Log::error('Error updating Fuel: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Fuel.
     *
     * @param Fuel $Fuel
     * @return void
     */
    public function deleteFuel($Fuel){
        try {
            $Fuel->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Fuel '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
<?php

namespace App\Services;

use Exception;
use App\Models\Gear;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GearService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Gears information
     */
    public function listGear(int $perPage) {
        try {
            return Gear::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Gear '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Gear.
     * @param array $fieldInputs
     * @return \App\Models\Gear
     */
    public function createGear(array $fieldInputs)
    {
        try{
            return Gear::create([
                    'gear_type' => $fieldInputs["gear_type"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Gear: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Gear.
     *
     * @param \App\Models\Gear $Gear
     * @return \App\Models\Gear
     */
    public function getGear(Gear $Gear)
    {
        try {
            return $Gear;
        } catch (Exception $e) {
            Log::error('Error retrieving Gear: ' . $e->getMessage());
            throw new Exception('Error retrieving Gear.');
        }
    }

    /**
     * Update a specific Gear.
     *
     * @param array $fieldInputs
     * @param Gear $Gear
     * @return \App\Models\Gear
     */
    public function updateGear(array $fieldInputs, $Gear) {
        try {
            $data = [
                    "gear_type" => $fieldInputs["gear_type"],
        ];
            $Gear->update(array_filter($data));
            return $Gear;
        } catch (Exception $e) {
            Log::error('Error updating Gear: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Gear.
     *
     * @param Gear $Gear
     * @return void
     */
    public function deleteGear($Gear){
        try {
            $Gear->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Gear '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
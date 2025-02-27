<?php

namespace App\Services;

use Exception;
use App\Models\Color;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ColorService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Colors information
     */
    public function listColor(int $perPage) {
        try {
            return Color::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Color '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Color.
     * @param array $fieldInputs
     * @return \App\Models\Color
     */
    public function createColor(array $fieldInputs)
    {
        try{
            return Color::create([
                    'name' => $fieldInputs["name"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Color: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Color.
     *
     * @param \App\Models\Color $Color
     * @return \App\Models\Color
     */
    public function getColor(Color $Color)
    {
        try {
            return $Color;
        } catch (Exception $e) {
            Log::error('Error retrieving Color: ' . $e->getMessage());
            throw new Exception('Error retrieving Color.');
        }
    }

    /**
     * Update a specific Color.
     *
     * @param array $fieldInputs
     * @param Color $Color
     * @return \App\Models\Color
     */
    public function updateColor(array $fieldInputs, $Color) {
        try {
            $data = [
                    "name" => $fieldInputs["name"],
        ];
            $Color->update(array_filter($data));
            return $Color;
        } catch (Exception $e) {
            Log::error('Error updating Color: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Color.
     *
     * @param Color $Color
     * @return void
     */
    public function deleteColor($Color){
        try {
            $Color->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Color '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
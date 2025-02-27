<?php

namespace App\Services;

use Exception;
use App\Models\Photo;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PhotoService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Photos information
     */
    public function listPhoto(int $perPage) {
        try {
            return Photo::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Photo '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Photo.
     * @param array $fieldInputs
     * @return \App\Models\Photo
     */
    public function createPhoto(array $fieldInputs)
    {
        try{
            return Photo::create([
                    'name' => $fieldInputs["name"],
                    'url' => $fieldInputs["url"],
                    'photoable_type' => $fieldInputs["photoable_type"],
                    'photoable_id' => $fieldInputs["photoable_id"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Photo: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Photo.
     *
     * @param \App\Models\Photo $Photo
     * @return \App\Models\Photo
     */
    public function getPhoto(Photo $Photo)
    {
        try {
            return $Photo;
        } catch (Exception $e) {
            Log::error('Error retrieving Photo: ' . $e->getMessage());
            throw new Exception('Error retrieving Photo.');
        }
    }

    /**
     * Update a specific Photo.
     *
     * @param array $fieldInputs
     * @param Photo $Photo
     * @return \App\Models\Photo
     */
    public function updatePhoto(array $fieldInputs, $Photo) {
        try {
            $data = [
                    "name" => $fieldInputs["name"],
                    "url" => $fieldInputs["url"],
                    "photoable_type" => $fieldInputs["photoable_type"],
                    "photoable_id" => $fieldInputs["photoable_id"],
        ];
            $Photo->update(array_filter($data));
            return $Photo;
        } catch (Exception $e) {
            Log::error('Error updating Photo: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Photo.
     *
     * @param Photo $Photo
     * @return void
     */
    public function deletePhoto($Photo){
        try {
            $Photo->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Photo '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
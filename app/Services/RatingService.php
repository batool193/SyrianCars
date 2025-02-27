<?php

namespace App\Services;

use Exception;
use App\Models\Rating;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RatingService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Ratings information
     */
    public function listRating(int $perPage) {
        try {
            return Rating::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Rating '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Rating.
     * @param array $fieldInputs
     * @return \App\Models\Rating
     */
    public function createRating(array $fieldInputs)
    {
        try{
            return Rating::create([
                    'user_id' => $fieldInputs["user_id"],
                    'car_id' => $fieldInputs["car_id"],
                    'rate' => $fieldInputs["rate"],
                    'review' => $fieldInputs["review"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Rating: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Rating.
     *
     * @param \App\Models\Rating $Rating
     * @return \App\Models\Rating
     */
    public function getRating(Rating $Rating)
    {
        try {
            return $Rating;
        } catch (Exception $e) {
            Log::error('Error retrieving Rating: ' . $e->getMessage());
            throw new Exception('Error retrieving Rating.');
        }
    }

    /**
     * Update a specific Rating.
     *
     * @param array $fieldInputs
     * @param Rating $Rating
     * @return \App\Models\Rating
     */
    public function updateRating(array $fieldInputs, $Rating) {
        try {
            $data = [
                    "user_id" => $fieldInputs["user_id"],
                    "car_id" => $fieldInputs["car_id"],
                    "rate" => $fieldInputs["rate"],
                    "review" => $fieldInputs["review"],
        ];
            $Rating->update(array_filter($data));
            return $Rating;
        } catch (Exception $e) {
            Log::error('Error updating Rating: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Rating.
     *
     * @param Rating $Rating
     * @return void
     */
    public function deleteRating($Rating){
        try {
            $Rating->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Rating '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
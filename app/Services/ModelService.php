<?php

namespace App\Services;

use Exception;
use App\Models\model;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModelService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all models information
     */
    public function listmodel(int $perPage) {
        try {
            return model::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing model '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new model.
     * @param array $fieldInputs
     * @return \App\Models\model
     */
    public function createmodel(array $fieldInputs)
    {
        try{
            return model::create([
                    'brand_id' => $fieldInputs["brand_id"],
                    'name' => $fieldInputs["name"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating model: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


    /**
     * Get the details of a specific model.
     *
     * @param \App\Models\model $model
     * @return \App\Models\model
     */
    public function getmodel(model $model)
    {
        try {
            return $model;
        } catch (Exception $e) {
            Log::error('Error retrieving model: ' . $e->getMessage());
            throw new Exception('Error retrieving model.');
        }
    }

    /**
     * Update a specific model.
     *
     * @param array $fieldInputs
     * @param model $model
     * @return \App\Models\model
     */
    public function updatemodel(array $fieldInputs, $model) {
        try {
            $data = [
                    "brand_id" => $fieldInputs["brand_id"],
                    "name" => $fieldInputs["name"],
        ];
            $model->update(array_filter($data));
            return $model;
        } catch (Exception $e) {
            Log::error('Error updating model: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific model.
     *
     * @param model $model
     * @return void
     */
    public function deletemodel($model){
        try {
            $model->delete();
        } catch (Exception $e) {
            Log::error('Error deleting model '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}

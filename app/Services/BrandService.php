<?php

namespace App\Services;

use Exception;
use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BrandService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Brands information
     */
    public function listBrand(int $perPage) {
        try {
            return Brand::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Brand '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Brand.
     * @param array $fieldInputs
     * @return \App\Models\Brand
     */
    public function createBrand(array $fieldInputs)
    {
        try{
            return Brand::create([
                    'name' => $fieldInputs["name"],
                    'founded_year' => $fieldInputs["founded_year"],
                    'country' => $fieldInputs["country"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Brand: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Brand.
     *
     * @param \App\Models\Brand $Brand
     * @return \App\Models\Brand
     */
    public function getBrand(Brand $Brand)
    {
        try {
            return $Brand;
        } catch (Exception $e) {
            Log::error('Error retrieving Brand: ' . $e->getMessage());
            throw new Exception('Error retrieving Brand.');
        }
    }

    /**
     * Update a specific Brand.
     *
     * @param array $fieldInputs
     * @param Brand $Brand
     * @return \App\Models\Brand
     */
    public function updateBrand(array $fieldInputs, $Brand) {
        try {
            $data = [
                    "name" => $fieldInputs["name"],
                    "founded_year" => $fieldInputs["founded_year"],
                    "country" => $fieldInputs["country"],
        ];
            $Brand->update(array_filter($data));
            return $Brand;
        } catch (Exception $e) {
            Log::error('Error updating Brand: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Brand.
     *
     * @param Brand $Brand
     * @return void
     */
    public function deleteBrand($Brand){
        try {
            $Brand->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Brand '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
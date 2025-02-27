<?php

namespace App\Services;

use Exception;
use App\Models\Car;
use Illuminate\Support\Facades\Log;
use CodingPartners\AutoController\Traits\ApiResponseTrait;
use CodingPartners\AutoController\Traits\FileStorageTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CarService
{
    use ApiResponseTrait, FileStorageTrait;

    /**
     * list all Cars information
     */
    public function listCar(int $perPage) {
        try {
            return Car::paginate($perPage);
        } catch (Exception $e) {
            Log::error('Error Listing Car '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Create a new Car.
     * @param array $fieldInputs
     * @return \App\Models\Car
     */
    public function createCar(array $fieldInputs)
    {
        try{
            return Car::create([
                    'user_id' => $fieldInputs["user_id"],
                    'brand_id' => $fieldInputs["brand_id"],
                    'model_id' => $fieldInputs["model_id"],
                    'color_id' => $fieldInputs["color_id"],
                    'gear_id' => $fieldInputs["gear_id"],
                    'city_id' => $fieldInputs["city_id"],
                    'fuel_id' => $fieldInputs["fuel_id"],
                    'production_year' => $fieldInputs["production_year"],
                    'engine_power' => $fieldInputs["engine_power"],
                    'condition' => $fieldInputs["condition"],
                    'mileage' => $fieldInputs["mileage"],
                    'price' => $fieldInputs["price"],
                    'description' => $fieldInputs["description"],
                    'plate_number' => $fieldInputs["plate_number"],
                    'is_available' => $fieldInputs["is_available"],
            ]);
        } catch (Exception $e) {
            Log::error('Error creating Car: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }
    

    /**
     * Get the details of a specific Car.
     *
     * @param \App\Models\Car $Car
     * @return \App\Models\Car
     */
    public function getCar(Car $Car)
    {
        try {
            return $Car;
        } catch (Exception $e) {
            Log::error('Error retrieving Car: ' . $e->getMessage());
            throw new Exception('Error retrieving Car.');
        }
    }

    /**
     * Update a specific Car.
     *
     * @param array $fieldInputs
     * @param Car $Car
     * @return \App\Models\Car
     */
    public function updateCar(array $fieldInputs, $Car) {
        try {
            $data = [
                    "user_id" => $fieldInputs["user_id"],
                    "brand_id" => $fieldInputs["brand_id"],
                    "model_id" => $fieldInputs["model_id"],
                    "color_id" => $fieldInputs["color_id"],
                    "gear_id" => $fieldInputs["gear_id"],
                    "city_id" => $fieldInputs["city_id"],
                    "fuel_id" => $fieldInputs["fuel_id"],
                    "production_year" => $fieldInputs["production_year"],
                    "engine_power" => $fieldInputs["engine_power"],
                    "condition" => $fieldInputs["condition"],
                    "mileage" => $fieldInputs["mileage"],
                    "price" => $fieldInputs["price"],
                    "description" => $fieldInputs["description"],
                    "plate_number" => $fieldInputs["plate_number"],
                    "is_available" => $fieldInputs["is_available"],
        ];
            $Car->update(array_filter($data));
            return $Car;
        } catch (Exception $e) {
            Log::error('Error updating Car: ' . $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }

    /**
     * Delete a specific Car.
     *
     * @param Car $Car
     * @return void
     */
    public function deleteCar($Car){
        try {
            $Car->delete();
        } catch (Exception $e) {
            Log::error('Error deleting Car '. $e->getMessage());
            throw new Exception('there is something wrong in server');
        }
    }


}
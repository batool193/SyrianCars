<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [            
            'id' => $this->id,
            'user_id' => $this->user_id,
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'color_id' => $this->color_id,
            'gear_id' => $this->gear_id,
            'city_id' => $this->city_id,
            'fuel_id' => $this->fuel_id,
            'production_year' => $this->production_year,
            'engine_power' => $this->engine_power,
            'condition' => $this->condition,
            'mileage' => $this->mileage,
            'price' => $this->price,
            'description' => $this->description,
            'plate_number' => $this->plate_number,
            'is_available' => $this->is_available,
        ];
    }
}

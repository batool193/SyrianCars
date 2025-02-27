<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            'car_id' => $this->car_id,
            'rate' => $this->rate,
            'review' => $this->review,
        ];
    }
}

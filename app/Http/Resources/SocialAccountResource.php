<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialAccountResource extends JsonResource
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
            'provider_name' => $this->provider_name,
            'provider_id' => $this->provider_id,
            'user_id' => $this->user_id,
        ];
    }
}

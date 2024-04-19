<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'brand_name' => $this->brand_name,
            'origin_country' => $this->origin_country,
            'ethical' => $this->ethical,
            'rating' => $this->rating,
            'brand_logo' => $this->brand_logo,
        ];
    }
}

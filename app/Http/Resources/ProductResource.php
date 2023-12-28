<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->uid,
            'name'=> $this->product_name,
            'slug'=> $this->product_slug,
            'brand'=> $this->product_brand,
            'price'=> $this->product_price,
            'sale_price'=> $this->product_sale_price,
            'sku'=> $this->product_sku,
            'image_url'=> $this->product_image_url,
            'short_description'=> $this->product_short_description,
            'long_description'=> $this->product_long_description,
            'status'=> $this->status ? "active": "deactive",
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
          ];
    }
}

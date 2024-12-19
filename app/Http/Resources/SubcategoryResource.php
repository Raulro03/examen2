<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/** @mixin Subcategory */class SubcategoryResource extends JsonResource{
    public function toArray(Request $request): array
    {
        return [
'id' => $this->id,
'name' => $this->name,
'description' => $this->description,
'category_id' => $this->category_id,
'created_at' => $this->created_at,
'updated_at' => $this->updated_at,//
        ];
    }
}

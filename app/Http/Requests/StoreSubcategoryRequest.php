<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'description' => ['required'],
            'category_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

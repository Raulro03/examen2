<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index()
    {
        return SubcategoryResource::collection(Subcategory::with('category')->paginate(10));
    }

    /*public function list()
    {
        return SubcategoryResource::collection(Subcategory::with('category')->paginate(12));
    }*/

    public function store(StoreSubcategoryRequest $request)
    {
       /*$subcategory = ;
       $subcategory->products()->attach($request->input('products', []));*/

        return new SubcategoryResource(Subcategory::create($request->validated()));
    }

    public function show(Subcategory $subcategory)
    {
        return new SubcategoryResource($subcategory);
    }

    public function update(UpdateSubcategoryRequest $request, Subcategory $subcategory)
    {
        $subcategory->update($request->all());

        return new SubcategoryResource($subcategory);
    }

    public function destroy(Subcategory $subcategory)
    {
        $subcategory->products()->detach();
        $subcategory->delete();

        return response()->json();
    }

    public function list(){

        return SubcategoryResource::collection(Subcategory::with('category', 'products')->paginate(12));
    }
}

<?php

namespace App\Http\Controllers;

    use App\Http\Requests\SubcategoryRequest;
    use App\Http\Resources\SubcategoryResource;
    use App\Models\Subcategory;

    class SubcategoryController extends Controller {
        public function index()
        {
        return SubcategoryResource::collection(Subcategory::all());
        }

        public function store(SubcategoryRequest $request)
        {
        return new SubcategoryResource(Subcategory::create($request->validated()));
        }

        public function show(Subcategory $subcategory)
        {
        return new SubcategoryResource($subcategory);
        }

        public function update(SubcategoryRequest $request, Subcategory $subcategory)
        {
        $subcategory->update($request->validated());

        return new SubcategoryResource($subcategory);
        }

        public function destroy(Subcategory $subcategory)
        {
        $subcategory->delete();

        return response()->json();
        }
    }

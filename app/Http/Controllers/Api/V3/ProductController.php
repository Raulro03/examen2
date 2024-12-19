<?php

namespace App\Http\Controllers\Api\V3;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all()->paginate(9);

        return ProductResource::collection($products);
    }
    public function show(Product $product)
    {
        //abort_if(! auth()->user()->tokenCan('categories-show'), 403);

        return new ProductResource($product);
    }

    /**
     * Store a new product
     *
     * Creating a new product
     *
     * @bodyParam name string required The name of the product. Example: Electronics
     */
    public function store(StoreProductRequest $request)
    {

        abort_if(! auth()->user()->tokenCan('products-store'), 403);
        $data = $request->all();

        $product = Product::create($data);

        return new ProductResource($product);
    }

    public function update(Product $product, StoreProductRequest $request)
    {
        abort_if(! auth()->user()->tokenCan('products-update'), 403);
        $product->update($request->all());

        return new ProductResource($product);
    }

    public function destroy(Product $product)
    {
        abort_if(! auth()->user()->tokenCan('products-destroy'), 403);
        $product->subcategories()->detach();
        $product->delete();

        //return response(null, Response::HTTP_NO_CONTENT);
        return response()->noContent();
    }
}

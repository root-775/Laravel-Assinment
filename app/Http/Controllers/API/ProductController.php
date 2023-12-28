<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->success([
            'data' => ProductResource::collection(Product::active()->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        $pro_name = $request->post('product_name');
        
        $product = Product::create([
            'product_name' => $pro_name,
            'product_slug' => Str::slug($pro_name),
            'product_brand' => $request->post('product_brand'),
            'product_price' => $request->post('product_price'),
            'product_sale_price' => $request->post('product_sale_price'),
            'product_sku' => $request->post('product_sku'),
            'product_image_url' => $request->post('product_image_url'),
            'product_short_description' => $request->post('product_short_description'),
            'product_long_description' => $request->post('product_long_description'),
            'status' => 1,
        ]);

        return response()->success([
            'data' => new ProductResource($product),
            'message' => 'product created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->success([
            'data' => new ProductResource(Product::find($id)),
            'message' => 'product fatch successfully',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pro_name = $request->post('product_name');
        $product = Product::updateOrCreate(
            ['id' => $id],
            [
                'product_name' => $pro_name,
                'product_slug' => Str::slug($pro_name),
                'product_brand' => $request->post('product_brand'),
                'product_price' => $request->post('product_price'),
                'product_sale_price' => $request->post('product_sale_price'),
                'product_sku' => $request->post('product_sku'),
                'product_image_url' => $request->post('product_image_url'),
                'product_short_description' => $request->post('product_short_description'),
                'product_long_description' => $request->post('product_long_description'),
                'status' => 1,
            ]
        );
        return response()->success([
            'data' => new ProductResource($product),
            'message' => 'product update successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if(isset($product)){
            $product->delete();
            return response()->success([
                'message' => 'product delete successfully',
            ]);
        }
        return response()->error([
            'message' => 'product not found!',
        ]);
    }
}

<?php
namespace App\Repository;

use App\Models\Product;
use App\helpers\ApiResponse;
use App\Http\Requests\ProductRequest;
use App\Traits\ImageUpload;

class ProductRepository
{
    use ImageUpload ;
    
    // add pagination
    public function index()
    {
        return Product::all();
    }

    public function store(ProductRequest $request)
    {
        Product::create(
            [
                'image' => $request->file('image')->store('public'),
                'is_active' => false,
            ] + $request->validated(),
        );

        // you have to move ApiResponse to controoler, here you just have to return true if data creted successfully 
        return ApiResponse::createSuccessResponse();
    }


    ///what this function does ?
    public function show(Product $product)
    {
        return $product ;
    }


    /// delete this function ???
    public function edit(Product $product)
    {
        return $product ;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->updateImage($product);

        $product->update(
            [
                'image' => $this->uploadImage('image_product'),
            ] + $request->validated(),
        );


        //same proplem, you have to  return boolean value here, then use it in controller
        return ApiResponse::updateSuccessResponse();
    }

    public function destroy(Product $product)
    {
        $this->deleteImage($product);
        $product->delete();
        ///saome proplem ..
        return ApiResponse::deleteSuccessResponse();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        return [
            'status' => 'ok',
            'data' => Product::simplePaginate()
        ];
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return [
            'status' => 'ok',
            'data' => $product
        ];
    }
}

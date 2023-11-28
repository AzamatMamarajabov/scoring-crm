<?php

namespace App\Http\Controllers;

use App\Models\Percentage;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class productImageController extends Controller
{
    public function index($id)
    {
        $product = Product::all()->find($id);
        $percentage = Percentage::all();
        $image = Store::all()->find(Auth::user()->store_id);
        return view('Product.image', compact('product', 'percentage','image'));
    }
}

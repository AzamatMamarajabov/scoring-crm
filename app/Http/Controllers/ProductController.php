<?php

namespace App\Http\Controllers;

use App\Models\Exchangerate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $dollar = Exchangerate::all()->first();
        return view('Product.index', compact('products', 'dollar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required',
        'shtrix_code' => 'required',
        'store_id' => 'required',
    ]);

    if ($request->hasFile('image')) {
        $path = $request->file('image')->store("uploads", 'public');
    } else {
        $path = 'nofoto.jpg';
    }

    $requestData = $request->all();
    $dollar = Exchangerate::first(); 

    if ($requestData['pricesum'] != null && $requestData['pricedollar'] != null) {
        return redirect()->route('products.create')->with('success', "Maxsulot narxini so'mda yoki dollarda kiriting (Faqat 1 tasiga yozilsin)");
    } else if ($requestData['pricedollar'] != null) {
        $requestData['price'] = $requestData['pricedollar'] * $dollar->dollar;
    } else if ($requestData['pricesum'] != null) {
        $requestData['price'] = $requestData['pricesum'];
    }

    $requestData['image'] = $path;

    // Assuming 'price' field is in your Product model fillable attributes
    $product = Product::create($requestData);

    return redirect()->route('products.index')->with('success', 'Product added successfully');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('Product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'shtrix_code' => 'required',
            'store_id' => 'required',
        ]);
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store("uploads", 'public');
            $requestData['image'] = $path;
        }
        $product->update($requestData);

        return redirect()->route('products.index')->with('success', 'Product added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $user = Auth::user();

        // Agar foydalanuvchi admin ro'li bo'lsa va 24 soat ichida bo'lsa:
        if ($user->role == 'admin' && $product->created_at->gt(now()->subHours(24))) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }

        // Agar foydalanuvchi superadmin bo'lsa:
        if ($user->role == 'superadmin') {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Product deleted successfully');
        }

        // Agar hech qanday shart bajarilmagan bo'lsa, ruxsat berilmaydi:
        return redirect()->route('products.index')->with('error', 'You do not have permission to delete this product.');
    }
}

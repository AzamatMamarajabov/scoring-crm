<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Cash;
use App\Models\User;
use App\Models\Worker;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Platform;
use App\Models\Sell;
use Illuminate\Support\Facades\Auth;
class SuperSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('payments')->get();
        return view('superadmin.supersell.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('id', $request->userId)->first();
        $store = $user->store;
        $userId = Auth::user()->id;
        $product = Product::find($request->product_id);

        $data = $request->all();
        $data['user_id'] = $userId;
        $data['store_id'] = $store->id;
        $data['sum'] = $request->sum * $request->count;
        $data['platform_id'] = $request->platform_id;
        $data['customer_id'] = $request->customer_id;
        $sell = Sell::create($data);

        $data2 = $request->all();
        $data2['user_id'] = $userId;
        $data2['store_id'] = $store->id;
        $data2['payment_type'] = $sell->payment_type;
        $data2['type'] = 'income';
        $data2['sum'] = $sell->sum;
        $data2['cash_id'] = $request->cash_id;
        $data2['comment'] = $product->name;
        $payment = Payment::create($data2);

        return redirect()->back()->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supersell)
    {
        $user = User::where('store_id', $supersell)->first();

        if (!$user) {
            // Handle case where user doesn't exist
            return redirect()->back()->with('error', 'User not found');
        }

        $store = $user->store;

        if (!$store) {
            // Handle case where store doesn't exist for the user
            return redirect()->back()->with('error', 'Store not found for this user');
        }

        $sells = Sell::where('store_id', $supersell)->orderBy('id', 'desc')->get();
        $products = Product::all();
        $customers = Customer::all();
        $platforms = Platform::all();
        $cashes = Cash::all();

        return view('superadmin.supersell.show', compact('user', 'store', 'sells', 'products','customers','platforms','cashes'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

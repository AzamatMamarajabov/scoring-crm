<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Sell;
use App\Models\Platform;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Cash;
class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('sells')->get();

        return view('superadmin.sell.index', compact('stores'));
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

        $user = Auth::user();
        $store = $user->store;
        $product = Product::find($request->product_id);



        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['store_id'] = $store->id;
        $data['sum'] = $request->sum * $request->count;
        $data['platform_id'] = $request->platform_id;
        $data['customer_id'] = $request->customer_id;
        $sell = Sell::create($data);

        $data2 = $request->all();
        $data2['user_id'] = $user->id;
        $data2['store_id'] = $store->id;
        $data2['payment_type'] = $sell->payment_type;
        $data2['type'] = 'income';
        $data2['sum'] = $sell->sum;
        $data2['cash_id'] = $request->cash_id;
        $data2['comment'] = $product->name;
        $payment = Payment::create($data2);


        return to_route('sell.show', ['sell' => $user->id])->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $store = $user->store;
        $sells = Sell::where('store_id', $store->id)->orderBy('id', 'desc')->get();
        $products = Product::all();
        $customers = Customer::all();
        $platforms = Platform::all();
        $cashes = Cash::all();
        return view('admin.sell.index', compact('user', 'store', 'sells', 'products','customers','platforms','cashes'));

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

    public function info($id){
        $store = Store::find($id);
        $sells = Sell::where('store_id', $id)->orderBy('id', 'desc')->get();
        return view('superadmin.sell.info', compact('store', 'sells'));
    }
}

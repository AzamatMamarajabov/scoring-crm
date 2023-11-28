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
use App\Models\History;
use Illuminate\Support\Facades\Auth;
class SuperWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('payments')->get();
        return view('superadmin.superwarehouse.index', compact('stores'));
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

        $user = User::where('store_id', $request->store_id)->first();
        $store = $user->store;

       

        $data = $request->all();
        if($request->type == 'income'){
            $data['to_id'] = $user->store_id;
        }
        $data['user_id'] = Auth::user()->id;
        $history = History::create($data);
        return redirect()->back()->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($superwarehouse)
    {
        $products = Product::all();
        $user = User::where('store_id', $superwarehouse)->first();
        $shop = $user->store;
        $stores = Store::where('id', '!=', $shop->id)->get();
        $histories = $shop->histories();
        return view('superadmin.superwarehouse.show', compact('products', 'stores', 'histories', 'shop', 'user','superwarehouse'));
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

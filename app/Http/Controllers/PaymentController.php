<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Payment;
use App\Models\Cash;
use App\Models\Worker;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('payments')->get();
        return view('superadmin.payment.index', compact('stores'));
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

    if ($request->type == 'outcome' && $store->calculatePayment() < $request->sum) {
        return redirect()->route('payment.show', ['payment' => $request->cash])->with('error', 'Chiqim uchun pul yetarli emas!');
    }

    $data = $request->all();
    $data['user_id'] = $user->id;

    if ($request->store_id === null || $request->store_id == $store->id) {
        $data['store_id'] = $store->id;
    }

    if ($request->cash_id === null || $request->cash_id == $request->cash) {
        $data['cash_id'] = $request->cash;
    }
    $data['comment'] = "Hodim: " . $request->worker . " Comment: " . $request->comment;



    $data['type'] = $request->type == 'outcome' && $request->cash == $data['cash_id'] ? 'outcome' : 'income';

    $payment = Payment::create($data);

    return redirect()->route('payment.show', ['payment' => $request->cash])->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($payment)
    {
        $user = Auth::user();
        $cashes = Cash::all();
        $stores = Store::all();
        $store = $user->store;
        $cash_id = $payment;
        $payments = Payment::all();
        $workers = Worker::all();
        return view('admin.payment.index', compact('user', 'store', 'payments', 'cash_id','cashes','stores','workers'));
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
        $payments = Payment::where('store_id', $id)->orderBy('id', 'desc')->get();
        return view('superadmin.payment.store', compact('store', 'payments'));
    }
}

<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Cash;
use App\Models\User;
use App\Models\Worker;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class SuperCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('payments')->get();
        return view('superadmin.supercash.index', compact('stores'));
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

        $this->validate($request, [
            'name' => 'required',
            'store_id' => 'required',
            'user_id' => 'required',
        ]);

        $requestData = $request->all();

        Cash::create($requestData);

        return redirect()->back()->with('success', 'Cash added successfully');
       }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supercash, $user_id)
    {
        // Berilgan $user_id bo'yicha foydalanuvchini olish va bog'lanishni boshqarish (agar bog'lanish nomi 'store' bo'lsa)
        $user = User::with('store')->find($user_id);

        if (!$user) {
            // Foydalanuvchi topilmagan holatda, masalan, xatolik xabarini qaytarish yoki yo'nalish qilish mumkin
            return redirect()->route('some.route')->with('error', 'Foydalanuvchi topilmadi');
        }

        $cashes = Cash::all();
        $stores = Store::all();
        $store = $user->store;
        $cash_id = $supercash;
        $payments = Payment::all();
        $workers = Worker::all();

        return view('superadmin.supercash.show', compact('user', 'store', 'payments', 'cash_id', 'cashes', 'stores', 'workers'));
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
        $cash = Cash::find($id);
        $cash->delete();
        return redirect()->back()->with('success', 'Cash deleted successfully');

    }


    public function cash($store_id)
    {
        $user = User::where('store_id', $store_id)->first();
        $userId = $user->id;
        $cashes = Cash::all();

        return view('superadmin.supercash.cash', compact('cashes','userId','store_id'));
    }


    public function PaymentStore(Request $request)
{
    $cashe = Cash::find($request->cash); // Fetch Cash record by its ID

    if (!$cashe) {
        return redirect()->back()->with('error', 'Cash record not found!');
    }

    $user = User::where('id', $cashe->user_id)->first();

    if (!$user) {
        return redirect()->back()->with('error', 'Associated user not found!');
    }

    $store = $user->store;

    if ($request->type == 'outcome' && $store->calculatePayment() < $request->sum) {
        return redirect()->back()->with('error', 'Chiqim uchun pul yetarli emas!');
       
    }

    $data = $request->all();
    $data['user_id'] = Auth::user()->id;

    if ($request->store_id === null || $request->store_id == $store->id) {
        $data['store_id'] = $store->id;
    }

    if ($request->cash_id === null || $request->cash_id == $request->cash) {
        $data['cash_id'] = $request->cash;
    }

    $data['comment'] = "Hodim: " . $request->worker . " Comment: " . $request->comment;

    $data['type'] = $request->type == 'outcome' && $request->cash == $data['cash_id'] ? 'outcome' : 'income';

    $payment = Payment::create($data);

    return redirect()->route('supercash.show', ['supercash' => $request->cash,'user_id' => $user->id])
    ->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');

}


}

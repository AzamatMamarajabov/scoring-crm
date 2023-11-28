<?php

namespace App\Http\Controllers;
use App\Models\Application;
use App\Models\Debt;
use App\Models\Cash;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $application = Application::where('status',3)->get();
        return view('admin.active.index',compact('application'));
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
        $debt = Debt::find($request->input('id'));
        $debt->active = true;
        $debt->save();

        $payment = new Payment();
        $payment->sum = round($debt->summa);
        $payment->type = $request->input('type');
        $payment->payment_type = $request->input('payment_type');
        $payment->comment = $request->input('comment');
        $payment->store_id = Auth::user()->store_id;
        $payment->user_id = Auth::user()->id;
        $payment->cash_id = $request->cash_id;
        $payment->save();

        return redirect()->route('activeapplication.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = Application::find($id);
        $cashes = Cash::all();
        $debts = Debt::where('application_id', $application->id)->get();
        $debtrests = Debt::where('application_id', $application->id)->where('active', 0)->get();
        $sumRests = 0;
        $monthsumma = number_format($application->sum/$application->month,2);
        foreach ($debtrests as $debtrest) {
            $sumRests += $debtrest->summa;
        }


        return view('admin.active.show', compact('application', 'debts','sumRests','monthsumma','cashes'));
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

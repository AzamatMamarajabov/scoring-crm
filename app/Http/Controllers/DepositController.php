<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Worker;
class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposit = Deposit::first();
        return view('deposit.index', compact('deposit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deposit.create');
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
        'deposit_sum' => 'required',
        'start_sum' => 'required',
        'vip_sum' => 'required',
        'gold_sum' => 'required',
        'worker_salary_persentage' => 'required|numeric',
    ]);
    $requestData = $request->all();

    Deposit::create($requestData);

    return redirect()->route('deposits.index')->with('success', 'Deposit added successfully');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        return view('deposit.show', compact('deposit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        return view('deposit.edit', compact('deposit'));
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
    $deposit = Deposit::findOrFail($id);

    $data = $request->validate([
        'deposit_sum' => 'required',
        'start_sum' => 'required',
        'vip_sum' => 'required',
        'gold_sum' => 'required',
        'worker_salary_persentage' => 'required',
    ]);

    $deposit->update($data);

    return redirect()->route('deposits.index')
        ->with('success', 'Deposit updates successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->delete();

        return redirect()->route('deposits.index')
            ->with('success', 'Deposit deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
class CashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashes = Cash::all();
        return view('admin.payment.cash', compact('cashes'));
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

        return redirect()->route('cashes.index')->with('success', 'Cash added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
    public function update(Request $request,Cash $cash)
    {
        $this->validate($request, [
            'name' => 'required',
            'store_id' => 'required',
            'user_id' => 'required',
        ]);

        $requestData = $request->all();

        $cash->update($requestData);

        return redirect()->route('cashes.index')->with('success', 'Cash update successfully');
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
        return redirect()->route('cashes.index')
        ->with('success', 'Cash deleted successfully');

    }
}

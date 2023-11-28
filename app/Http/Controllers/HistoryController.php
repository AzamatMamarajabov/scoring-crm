<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Store;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $stores = Store::all();
        $histories = History::with('responsible', 'sender', 'reciever', 'product')
        ->orderBy('id', 'desc')
        ->get();
        return view('superadmin.history.index', compact('products', 'stores', 'histories'));
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
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $history = History::create($data);
        return to_route('history.index')->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::all();
        $stores = Store::all();
        $history = History::with('responsible', 'sender', 'reciever', 'product')->findOrFail($id);
        return view('superadmin.history.edit', compact('products', 'stores', 'history'));
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
        $history = History::findOrFail($id);
        $data = $request->all();
        $history->update($data);
        return redirect()->back()->with('success', 'Ma`lumot muvaffaqiyatli yangilandi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = History::findOrFail($id);
        $history->delete();
        return to_route('history.index')->with('success', 'Ma`lumot muvaffaqiyatli o`chirildi!');
    }
}

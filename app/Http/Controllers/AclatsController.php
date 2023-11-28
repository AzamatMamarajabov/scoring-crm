<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aclats;
class AclatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aclats = Aclats::all();
        return view('superadmin.aclats.index', compact('aclats'));
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
            'price' => 'required',
            'percentage' => 'required',
        ]);

        $requestData = $request->all();

        Aclats::create($requestData);

        return redirect()->route('aclats.index')->with('success', 'Aklat added successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aclats $aclat)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'percentage' => 'required',
        ]);

        $requestData = $request->all();

        $aclat->update($requestData);

        return redirect()->route('aclats.index')->with('success', 'Aklat update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aclat = Aclats::find($id);
        $aclat->delete();
        return redirect()->route('aclats.index')
        ->with('success', 'Aklat deleted successfully');
        }
}

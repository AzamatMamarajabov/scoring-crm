<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Percentage;

class PercentageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percentages = Percentage::all();
        return view('percentage.index', compact('percentages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('percentage.create');
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
                'month' => 'required',
                'percentage' => 'required',
            ]);
            $requestData = $request->all();

            Percentage::create($requestData);

            return redirect()->route('percentages.index')->with('success', 'Percentage added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Percentage $percentage)
    {
        return view('percentage.show', compact('percentage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Percentage $percentage)
    {
        return view('percentage.edit', compact('percentage'));
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
        $percentage = Percentage::findOrFail($id);

            $data = $request->validate([
                'month' => 'required',
                'percentage' => 'required',

            ]);

            $percentage->update($data);

            return redirect()->route('percentages.index')
                ->with('success', 'Percentage updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $percentage = Percentage::findOrFail($id);
        $percentage->delete();

        return redirect()->route('percentages.index')
            ->with('success', 'Percentage deleted successfully');
    }
}

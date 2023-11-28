<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use App\Models\Aclats;
use App\Models\Worker;
use App\Models\WorkerHistory;
use App\Models\WorkerSalary;

class WorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return view('worker.index', compact('workers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deposits = Deposit::all();
        $aclats = Aclats::all();
        return view('worker.create', compact('deposits', 'aclats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'working_time' => 'required',
            'salary' => 'required',
            'other_phone' => 'nullable',
            'store_id' => 'required',
        ]);


        $phone = $request->phone;
        $other_phone = $request->other_phone;
        $pattern = "/^\+998\d{9}$/";


        if (!preg_match($pattern, $phone)) {
            return redirect()->back()->with('error', 'Telefon raqamlar xato kiritildi!');
        }
        if (!preg_match($pattern, $other_phone)) {
            return redirect()->back()->with('error', 'Telefon raqamlar xato kiritildi!');
        }
        $worker = Worker::create($validatedData);

        return redirect()->route('workers.index')
            ->with('success', 'Worker added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        $workerHistories = WorkerHistory::where('worker_id', $worker->id)->orderBY('id', 'DESC')->get();
        $workerSalaries = WorkerSalary::where('worker_id', $worker->id)->orderBY('id', 'DESC')->get();
        return view('worker.show', compact('worker', 'workerHistories', 'workerSalaries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Worker $worker)
    {
        return view('worker.edit', compact('worker'));
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
        $worker = Worker::findOrFail($id);
        $worker->delete();

        return redirect()->route('workers.index')
            ->with('success', 'Worker deleted successfully');
    }
}

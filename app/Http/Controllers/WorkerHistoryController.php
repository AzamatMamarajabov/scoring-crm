<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use App\Models\WorkerHistory;
use Illuminate\Http\Request;

class WorkerHistoryController extends Controller
{
    public function bonus(Request $request)
    {
        $this->validate($request, [
            'summa' => 'required',
            'comment' => 'required',
            'worker_id' => 'required',
            'worker_type' => 'required',
        ]);

        $requestData = $request->all();
        WorkerHistory::create($requestData);
        $worker = Worker::find($requestData['worker_id']);
        $worker->salary = $worker->salary + $requestData['summa'];
        $worker->save();
        return redirect()->route('workers.show', $requestData['worker_id']);
    }

    public function fine(Request $request)
    {
        $this->validate($request, [
            'summa' => 'required',
            'comment' => 'required',
            'worker_id' => 'required',
            'worker_type' => 'required',
        ]);

        $requestData = $request->all();
        WorkerHistory::create($requestData);
        $worker = Worker::find($requestData['worker_id']);
        $worker->salary = $worker->salary - $requestData['summa'];
        $worker->save();
        return redirect()->route('workers.show', $requestData['worker_id']);
    }
}

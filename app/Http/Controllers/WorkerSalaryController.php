<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Models\Worker;
use App\Models\WorkerSalary;
use App\Models\Payment;
class WorkerSalaryController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();
        $store = $user->store;
        $data = $request->all();
        $data['user_id'] = $user->id;
        $data['store_id'] = $user->store_id;
        $data['cash_id'] = $request->cash;

        $workerId = $request->worker;
        $worker = Worker::where('id', $workerId)->first();
        $data['comment'] = $worker->name;

        $data['type'] = 'outcome';
        $payment = Payment::create($data);

        $worker_id = $request->worker;
        $payment_id = $payment->id;
        $sum = $request->sum;

        $data2 = [
            'worker_id' => $worker_id,
            'payment_id' => $payment_id,
            'salary' => $sum,
        ];


        $worker_salary = WorkerSalary::create($data2);

        return redirect()->route('payment.show', ['payment' => $request->cash])->with('success', 'Ma`lumotlar muvaffaqiyatli qo`shildi!');
    }
}

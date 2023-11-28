<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cash;
use App\Models\Payment;
use App\Models\Debt;
use App\Models\Worker;
class ReportsController extends Controller
{
   public function cash()
{
    $cashes = Cash::all();
    $payments = Payment::whereIn('cash_id', $cashes->pluck('id'))->get();

    $totalSum = 0;

    foreach ($cashes as $cash) {
        $totalCashSum = 0;
        foreach ($payments as $payment) {
            if ($payment->cash_id == $cash->id) {
                $totalCashSum += $payment->sum;
            }
        }
        $totalSum += $totalCashSum;
        $cash->totalCashSum = $totalCashSum;
    }

    return view('superadmin.reports.cash', compact('cashes', 'totalSum'));
}

public function crStatus()
{
    $debts = Debt::all();

    $monthlyTotals = [];

    foreach ($debts as $debt) {
        $date = $debt->created_at->format('Y-m'); // Extract year and month
        $monthName = $debt->created_at->format('F Y'); // Format month as "Month Year"
        $monthlyTotals[$date] = ($monthlyTotals[$date] ?? 0) + $debt->summa;
    }

    // Create arrays to store monthly and yearly totals
    $monthlyTotals = [];
    $yearlyTotals = [];

    foreach ($debts as $debt) {
        $date = $debt->created_at->format('Y-m'); // Extract year and month
        $monthName = $debt->created_at->format('F Y'); // Format month as "Month Year"

        // Add the sum to the corresponding month
        $monthlyTotals[$date] = ($monthlyTotals[$date] ?? 0) + $debt->summa;

        // Add the sum to the corresponding year
        $year = $debt->created_at->format('Y'); // Extract year
        $yearlyTotals[$year] = ($yearlyTotals[$year] ?? 0) + $debt->summa;
    }

    // Calculate the total sum ($totalSum) for all months
    $totalSum = array_sum($monthlyTotals);

    // Calculate qoldqSum
    $qoldqSum = $debts
        ->where('active', 1)
        ->sum('summa');

    // Calculate the difference
    $difference = $totalSum - $qoldqSum;

    // Calculate allPrice
    $allPrice = $debts->sum('summa');
    $allqoldsum = $debts
    ->where('active', 1)
    ->sum('summa');
    $alldifference = $allPrice - $allqoldsum;

    return view('superadmin.reports.crstatus', compact('debts', 'monthlyTotals', 'yearlyTotals', 'qoldqSum', 'difference', 'totalSum', 'allPrice','allqoldsum','alldifference'));
}


public function allcredit()
{
    $payments = Payment::all();
    $workers = Worker::all();
    $workerCount = $workers->count();
    $totalSum = $payments->sum('sum');
    $cashPayments = $payments->where('payment_type', 'cash');
    $cardPayments = $payments->where('payment_type', 'card');
    $transferPayments = $payments->where('payment_type', 'transfer');
    $cashTotal = $cashPayments->sum('sum');
    $cardTotal = $cardPayments->sum('sum');
    $transferTotal = $transferPayments->sum('sum');

    return view('superadmin.reports.allcredit', compact('payments', 'totalSum','cashTotal','cardTotal','transferTotal','workerCount'));
}












}

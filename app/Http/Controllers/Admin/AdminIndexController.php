<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Store;
use App\Models\Payment;
use App\Models\Debt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

use Carbon\Carbon;

class AdminIndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function application_docs($id)
    {
        $data = Application::all()->find($id);
        $productsString = ($data->products);
        $input = trim($productsString, '[""]');
        $array = explode(",", $input);
        foreach ($array as $product) {
            $productModels[] = Product::where('id', $product)->get();
        }
        $store = Store::find(Auth::user()->store_id);
        return view('admin.application.docs', compact('data', 'productModels', 'store'));
    }

    public  function  applicationend(Request $request)
    {
        $application = Application::find($request->input('id'));
        $application->status = 3;
        $application->save();

        $startDate = Carbon::parse($application->payment_date);

        for ($i = 1; $i <= $application->month; $i++) {
            $debts = new Debt();
            $debts->costumer_id = $application->costumer_id;
            $debts->application_id = $application->id;
            $debts->summa = $application->sum / $application->month;
            $debts->month = $startDate->toDateString(); // Keep the full date format 'YYYY-MM-DD'
            $debts->active = false;
            // Perform any other operations with $debts

            // Move to the next month
            $startDate->addMonth();
            $debts->save();
        }

        return redirect()->route('activeapplication.index');
    }


    public function optionalsumma(Request $request)
    {
        $debts = Debt::where('application_id', $request->application_id)->where('active', 0)->get();
        $amountToDeduct = $request->count;

        foreach ($debts as $debt) {
            if ($amountToDeduct > 0) {
                // Check if the current debt amount is greater than or equal to the amount to deduct
                if ($debt->summa >= $amountToDeduct) {
                    if ($amountToDeduct != 0) {
                        $d = $debt->summa;
                        $debt->summa -= $amountToDeduct;
                        if ($debt->summa == 0) {
                            $debt->summa = $d;
                            $debt->active = 1;
                        }
                    }
                    // $debt->payment_type = $request->payment_type;
                    $debt->save();
                    $amountToDeduct = 0; // Deducted the full amount
                } else {
                    // Deduct as much as possible from the current debt and update the remaining amount to deduct
                    $amountToDeduct -= $debt->summa;
                    $debt->active = 1;
                    // $debt->payment_type = $request->payment_type;
                    $debt->save();
                }
            } else {
                break; // No more amount to deduct, exit the loop
            }
        }

        $payment = new Payment();
        $payment->sum = $request->count;
        $payment->type = 'income';
        $payment->payment_type = $request->input('payment_type');
        $payment->comment = $request->input('comment');
        $payment->store_id = Auth::user()->store_id;
        $payment->user_id = Auth::user()->id;
        $payment->cash_id = $request->cash_id;
        $payment->save();


        return redirect()->route('activeapplication.show', $request->application_id);
    }

    public function endapplication(Request $request)
    {
        $application = Application::all()->find($request->application_id);
        $application->update([
            'status' => 4
        ]);
        return redirect()->route('activeapplication.index');
    }


    public function noactiveapplication()
    {
        $application = Application::where('status', 4)->get();
        return view('admin.active.noactive', compact('application'));
    }

    public function noactiveapplicationshow($id)
    {
        $application = Application::find($id);

        $debts = Debt::where('application_id', $application->id)->get();
        $debtrests = Debt::where('application_id', $application->id)->where('active', 0)->get();
        $sumRests = 0;
        $monthsumma = number_format($application->sum / $application->month, 2);
        foreach ($debtrests as $debtrest) {
            $sumRests += $debtrest->summa;
        }

        return view('admin.active.noactiveshow', compact('application', 'debts', 'sumRests', 'monthsumma'));
    }
}

<?php

namespace App\Http\Controllers\Accountant;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Worker;
use App\Models\Deposit;

class AccountantIndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function debts(){
        return view('accountant.debts.index');
    }

    public function reports(){
        return view('accountant.report.index');
    }

    public function checkapplication()
    {
        $applications = Application::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
        return view('accountant.application.getapplication', compact('applications'));
    }


  public function checkapplicationid(Application $application)
    {
        $productsString = ($application->products);
        $input = trim($productsString, '[""]');
        $array = explode(",", $input);
        foreach ($array as $product) {
            $productModels[] = Product::where('id', $product)->get();
        }
        $data = Customer::find($application['costumer_id']);
        $cards = json_decode($data->customer_card_info);
        $contacts = json_decode($data->other_contact_info);
        return view('accountant.application.show',compact('application','productModels','cards','contacts'));
    }


    public function checkapplicationConfirm(Request $request)
    {

        $application = Application::find($request->input('status_id'));
        $application->status = $request->input('status');
        $application->save();

        return redirect()->back();
    }

    public function checkapplicationNoConfirm(Request $request)
    {

        $application = Application::find($request->input('status_id'));
        $application->status = $request->input('status');
        $application->save();
        $costumer = Customer::find($application->costumer_id);
        $costumer->limit = $costumer->limit - $application->sum;
        $costumer->save();
        $worker_salary_persentage = Deposit::first();
        $worker = Worker::find($application->worker_id);
        $worker->salary = $worker->salary + (($application->sum / 100) * $worker_salary_persentage->worker_salary_persentage);
        $worker->save();

        return redirect()->back();
    }




}

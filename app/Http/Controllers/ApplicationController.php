<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Customer;
use App\Models\Percentage;
use App\Models\Product;
use App\Models\Worker;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applications = Application::where('status', '!=', 3)->orderBy('id', 'DESC')->get();
        return view('admin.application.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $workers = Worker::all();
        $percentage = Percentage::all();
        $customers = Customer::all();
        return view('admin.application.add', compact('products', 'percentage', 'workers', 'customers'));
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
            'products' => 'required',
        ]);

        $requestData = $request->all();
        $requestData['products'] = json_encode($request->products);
        Application::create($requestData);

        return redirect()->route('application.index')->with('success', 'Deposit added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show(Application $application)
     {
        $productsString = ($application->products);
        $input = trim($productsString, '[""]');
        $array = explode(",", $input);
        foreach ($array as $product) {
            $productModels[] = Product::where('id', $product)->get();
        }

        return view('admin.application.show', compact('application', 'productModels'));
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
        //
    }
}

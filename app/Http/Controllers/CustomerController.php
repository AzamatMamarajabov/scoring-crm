<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Deposit;
use App\Models\Eskiz;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();


        return view('admin.customer.index', compact('customers'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = null;
        $main_phone = null;
        if (session()->has('user_data')) {
            $userData = session('user_data');
            $userPhone = $userData['customer_phone'];
            $userStatus = $userData['is_validated'];
            if (isset($userPhone) && $userStatus == true) {
                $status = 'success';
            }
            $main_phone = session('otp_phone');
        }
        $otp = session('otp_confirmation');
        return view('admin.customer.add', compact('status', 'otp', 'main_phone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $main_phone = session('otp_phone');
        if (!isset($main_phone)) {
            return redirect()->back()->with('error', 'Telefon raqamni qaytadan tasdiqlang');
        }

        $customers = Customer::where('phone', $main_phone)->first();

        if (isset($customers)) {
            return redirect()->back()->with('error', 'Bu telefon raqam bilan avval ro\'yxatdan o\'tilgan!');
        }

        $deposit_start = Deposit::all()->find(1);
        $data = $request->except(['_token']);

        $request->validate([
            'passport_surname' => 'required|string',
            'costumer_father_name' => 'required|string',
            'costumer_name' => 'required|string',
            'customSelect' => 'required|string',
            'costumer_birthday' => 'required|string',
            'passport_number' => 'required|string',
            'jshshir' => 'required|string',
            'citizenship' => 'required|string',
            'region' => 'required|string',
            'register_address' => 'required|string',
            'birthplace' => 'required|string',
            'given_by_whom' => 'required|string',
            'date_of_issue' => 'required|string',
            'validity_period' => 'required|string',
            'marital_status' => 'required|string',
            'cos_language' => 'required|string',
            'field_of_activity' => 'required|string',
            'customer_position' => 'required|string',
            'other_about' => 'required|string',
            'passport_front_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'passport_back_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'passport_customer_image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'other_file' => 'image|mimes:jpeg,png,jpg,gif',
            'store_id' => 'required',
        ]);

        // Rasm fayllarini olamiz
        if ($request->hasFile('passport_front_image')) {
            $path2 = $request->file('passport_front_image')->store("uploads", 'public');
        }
        if ($request->hasFile('passport_back_image')) {
            $path3 = $request->file('passport_back_image')->store("uploads", 'public');
        }
        if ($request->hasFile('passport_customer_image')) {
            $path4 = $request->file('passport_customer_image')->store("uploads", 'public');
        }
        $path5 = $request->hasFile('other_file') ? $request->file('other_file')->store("uploads", 'public') : null;




        // Ma'lumotlarni saqlash
        Customer::create([
            'phone' => $main_phone,
            'passport_surname' => $data['passport_surname'],
            'costumer_father_name' => $data['costumer_father_name'],
            'costumer_name' => $data['costumer_name'],
            'customSelect' => $data['customSelect'],
            'costumer_birthday' => $data['costumer_birthday'],
            'passport_number' => $data['passport_number'],
            'jshshir' => $data['jshshir'],
            'citizenship' => $data['citizenship'],
            'region' => $data['region'],
            'register_address' => $data['register_address'],
            'birthplace' => $data['birthplace'],
            'given_by_whom' => $data['given_by_whom'],
            'date_of_issue' => $data['date_of_issue'],
            'validity_period' => $data['validity_period'],
            'customer_card_info' => json_encode($data['invoice1']),
            'marital_status' => $data['marital_status'],
            'cos_language' => $data['cos_language'],
            'field_of_activity' => $data['field_of_activity'],
            'customer_position' => $data['customer_position'],
            'other_about' => $data['other_about'],

            'other_contact_info' => json_encode($data['invoice2']),

            'passport_front_image' => $path2,
            'passport_back_image' => $path3,
            'passport_customer_image' => $path4,
            'other_file' => $path5,
            'limit' => $deposit_start['start_sum'],
            'store_id' => $data['store_id'],
        ]);

        session()->forget('otp_confirmation');
        session()->forget('otp_phone');
        session()->forget('user_data');

        return redirect()->route('customer.index')->with('success', 'Customer added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Customer::find($id);
        $cards = json_decode($data->customer_card_info);
        $contacts = json_decode($data->other_contact_info);
        return view('admin.customer.show', compact('data', 'cards','contacts'));
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

    public function sendOtp(Request $request)
    {
        $customers = Customer::where('phone', $request->phone)->first();

        if (isset($customers)) {
            return redirect()->back()->with('error', 'Bu telefon raqam bilan avval ro\'yxatdan o\'tilgan!');
        }


        $phone = $request->phone;
        $pattern = "/^\+998\d{9}$/";
        if (!preg_match($pattern, $phone)) {
            return redirect()->back()->with('error', 'Telefon raqam xato kiritildi!');
        }

        $rand = rand(1000, 9999);
        $message = 'Elde scoring uchun tasdiqlash kodi:' . $rand;

        $eskiz = new Eskiz;
        $otp_status = $eskiz->send($message, $phone);
        if ($otp_status == 'error') {
            return redirect()->back()->with('error', 'Xabar yuborishda xatolik yuzberdi!');
        }
        if (session()->has('otp_confirmation') && session()->has('otp_phone')) {
            session()->forget('otp_confirmation');
            session()->forget('otp_phone');
        }
        session()->put('otp_confirmation', $rand);
        session()->put('otp_phone', $phone);
        $otp = session('otp_confirmation');
        return redirect()->back()->with('success', 'Tekshirish kodi yuborildi!');
    }

    public function checkOtp(Request $request)
    {
        if (intval($request->otp) === session('otp_confirmation')) {
            $data = [
                'customer_phone' => session('otp_phone'),
                'is_validated' => '1',
            ];
            session(['user_data' => $data]);
            return redirect()->back()->with('success', 'Telefon raqam tasdiqlandi!');
        }
        return redirect()->back()->with('error', 'Kod xato kiritildi!');
    }

    public function resetOtp()
    {
        session()->forget('otp_confirmation');
        return redirect()->back();
    }

    public function deleteOtp()
    {
        session()->forget('otp_confirmation');
        session()->forget('otp_phone');
        session()->forget('user_data');
        return redirect()->back();
    }
}

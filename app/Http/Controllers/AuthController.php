<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        if (Auth::attempt([
            'phone' => $request->phone,
            'password' => $request->password, 
        ])){
            $user = Auth::user();

            if ($user->role == 'superadmin') {
                return redirect()->route('superadmin.index');
            } elseif ($user->role == 'admin') {
                return redirect()->route('admin.index');
            } elseif ($user->role == 'manager') {
                return redirect()->route('manager.index');
            } elseif ($user->role == 'accountant') {
                return redirect()->route('accountant.index');
            }
        }
        return redirect()->back()->with('error', 'Telefon yoki parol xato kiritilgan!');
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }


}

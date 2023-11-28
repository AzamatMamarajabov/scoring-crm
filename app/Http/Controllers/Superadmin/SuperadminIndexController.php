<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class SuperadminIndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }


}

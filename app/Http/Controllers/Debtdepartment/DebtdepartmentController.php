<?php

namespace App\Http\Controllers\Debtdepartment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DebtdepartmentController extends Controller
{
    public function index(){
        return view('admin.index');
    }
}

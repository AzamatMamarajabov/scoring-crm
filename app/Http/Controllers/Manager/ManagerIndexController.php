<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerIndexController extends Controller
{
    public function index(){
        echo "you are manager";
    }
}

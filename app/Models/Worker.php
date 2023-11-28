<?php

namespace App\Models;

use App\Models\Deposit; // Büyük harfle başlayan "App\Models\Deposit" kullanılmalıdır.
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['name', 'phone', 'working_time', 'salary', 'other_phone', 'store_id'];
    protected $casts = [
        'working_time' => 'datetime',
    ];


   
}

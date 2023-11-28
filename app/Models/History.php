<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sender(){
        return $this->belongsTo(Store::class, 'from_id', 'id');
    }

    public function reciever(){
        return $this->belongsTo(Store::class, 'to_id', 'id');
    }

    public function responsible(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function histories()
    {
        return History::where(function ($query) {
            $query->where('from_id', $this->id)
                  ->orWhere('to_id', $this->id);
        })->with('responsible', 'sender', 'reciever', 'product')
        ->orderBy('id', 'desc')
        ->get();
    }

    public function calculate($id){
        $product = Product::find($id);
        $store = Store::find($this->id);
        $incomes = History::where('to_id', $this->id)->where('product_id', $id)->pluck('count')->sum();
        $outcomes = History::where('from_id', $this->id)->where('product_id', $id)->pluck('count')->sum();
        $sells = Sell::where('store_id', $this->id)->pluck('count')->sum();
        $result = $incomes - $outcomes - $sells;
        return $result;
    }
    
    public function calculatePayment(){
        $store = Store::find($this->id);
        $incomes = Payment::where('store_id', $this->id)->where('type', 'income')->pluck('sum')->sum();
        $outcomes = Payment::where('store_id', $this->id)->where('type', 'outcome')->pluck('sum')->sum();
        $result = $incomes - $outcomes;
        return $result;
    }
    
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    
    public function sells(){
        return $this->hasMany(Sell::class);
    }
}

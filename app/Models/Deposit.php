<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Worker;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = ['deposit_sum', 'start_sum', 'vip_sum', 'gold_sum', 'worker_salary_persentage'];

    public function workers()
    {
        return $this->hasMany(Worker::class, 'salary', 'id');
    }
}

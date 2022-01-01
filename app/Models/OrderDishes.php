<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDishes extends Model
{
    use HasFactory;
    protected $fillable = [
        'dishe_id',
        'order_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = "order";

    protected $fillable = [
        'customer_id',
        'dishe_id',
        'restaurant_id',
        'table_id',
        'total',
        'status'

    ];
}

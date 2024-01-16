<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }

    public function order_details(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }
}

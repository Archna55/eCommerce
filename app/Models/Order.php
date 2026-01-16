<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'order_id';
    protected $fillable = ['user_id', 'subtotal', 'discount', 'tax', 'total', 'name', 'phone', 'email', 'locality', 'city', 'state', 'country', 'pincode', 'status', 'is_shipping_different', 'delivery_date', 'cancel_date'];

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function orderItems() {
        return $this->hasMany(OrderItem::class);
    }
    public function transactions() {
        return $this->hasOne(Transaction::class);
    }
}

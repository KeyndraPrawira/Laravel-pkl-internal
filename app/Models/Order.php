<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['user_id', 'order_code', 'total_price', 'status'];

        public function product(){
            return $this->belongsToMany(Product::class)->withPivot('qty', 'price')
                    ->withTimestamps();
        }
}

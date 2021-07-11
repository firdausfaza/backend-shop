<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
    'product_id', 'customer_id', 'price', 'quantity', 'weight'
    ];
    // Relasi dari product 
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // Relasi dari customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}

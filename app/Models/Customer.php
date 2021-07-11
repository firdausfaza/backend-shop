<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
    'name', 'email', 'password'
    ];
    protected $hidden = [
    'password',
    'remember_token',
    ];
    // Relasi ke invoice jadi satu costumer bisa banyak invoice
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
    // relasi ke carts jadi satu customer bisa banyak carts
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}

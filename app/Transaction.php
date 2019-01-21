<?php

namespace App;

use App\Buyer;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
    	'quantity',
    	'buyer_id',
    	'product_id',
    ];

    //Relación 1:1 (uno a uno) entre Transacción y Comprador
    public function buyer()
    {
    	return $this->belongsTo(Buyer::class);
    }
    //Relación 1:1 (uno a uno) entre Transacción y Producto
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
}

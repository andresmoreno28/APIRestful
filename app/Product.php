<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	const PRODUCT_AVAILABLE = 'disponible';
	const PRODUCT_NOT_AVAILABLE = 'no disponible';


    protected $fillable = [
    	'name',
    	'description',
    	'quantity',
    	'status',
    	'image',
    	'seller_id',
    ];

    public function isAvailable()
    {
    	return $this->status == Product::PRODUCTO_DISPONIBLE;
    }
}

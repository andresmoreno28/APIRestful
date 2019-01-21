<?php

namespace App;

use App\Product;

class Seller extends User
{
	//Relación 1:M (uno a muchos) entre Vendedor y Productos
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}

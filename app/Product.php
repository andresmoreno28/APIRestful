<?php

namespace App;

use App\Seller;
use App\Category;
use App\Transaction;
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
    	return $this->status == Product::PRODUCT_AVAILABLE;
    }

    //Relación 1:1 (uno a uno) entre Producto y Vendedor
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    //Relación 1:M (uno a muchos) entre Producto y Transacciones
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    //Relación M:N  (Muchos a muchos) entre Productos y Categorías
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

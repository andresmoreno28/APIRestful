<?php

namespace App;

use App\Transaction;

class Buyer extends User
{
	//Relación 1:M (Uno a muchos) entre Buyer y Transaction
    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }
}

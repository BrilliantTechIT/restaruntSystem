<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offersproducts extends Model
{
    //

 

    public function product()
    {
        return $this->belongsTo(ProductTable::class, 'id_product');
    }

    public function offers()
    {
        return $this->belongsTo(Offers::class, 'id_offers');
    }
}

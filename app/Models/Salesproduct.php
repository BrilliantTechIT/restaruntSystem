<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salesproduct extends Model
{
    //

    public function prodect()
    {
        return $this->belongsTo(ProductTable::class,'id_p');
    }
}

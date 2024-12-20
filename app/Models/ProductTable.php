<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTable extends Model
{
    //

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'id_main_cat');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'id_sub_cat');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    //

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'id_maincategory');
    }
}

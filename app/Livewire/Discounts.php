<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DiscountsTable;
class Discounts extends Component
{
    public $dis;
    public function render()
    {
        $d=DiscountsTable::first();
        $this->dis=$d->n??0;
        return view('livewire.discounts');
    }
    public function change()
    {
        $d=DiscountsTable::first();
        $d=DiscountsTable::find($d->id);
        if($d)
        {
            // dd($d);
            $d->n=$this->dis;
            $d->save();
        }
        else
        {
           $nd=new DiscountsTable();
           $nd->n=$this->dis;
            $nd->save();
        }
    }
}

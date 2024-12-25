<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\ProductTable;
use App\Models\Offersproducts;
class OffersProduct extends Component
{
    public $id;
    public $main;
    public $sub;
    public $num=1;
    public $search = '';

    public function render()
    {
        $of=Offersproducts::Where('id_offers',$this->id)->get();
        $maincat=MainCategory::where('stute',1)->get();
        $subcat=SubCategory::where('id_maincategory',$this->main)->where('stute',1)->get();
        $product = ProductTable::where('stute',1)->where('name', 'like', '%' . $this->search . '%')->orWhere('id_sub_cat', $this->sub)->get();
                return view('livewire.offers-product',['product'=>$product,'subcat'=>$subcat,'maincat'=>$maincat,'of'=>$of]);
    }
    public function Store($id_p)
    {
        // dd($id_p);
        $d=new Offersproducts();
        // dd($this->main);
        $d->id_product=$id_p;
        $d->number=$this->num;
        $d->id_offers=$this->id;
        // $d->id_main_cat=$this->main;
        // $d->id_sub_cat=$this->sub;
        $d->save();
        session()->flash('success','تم الاضافة بنجاح');

    }

    public function Delete($id)
    {
        $d=Offersproducts::find($id);
        // dd($d);
        $d->delete();
    }

}

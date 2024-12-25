<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainCategory;
use App\Models\SubCategory;
use App\Models\ProductTable;
use Str;
class Product extends Component
{
    public $maincat=0;
    public $subcat=0;
    public $name;
    public $price;
    public $uid;
    public $records;
    public $stute = false;
    public $recordId = null;
    public $search = '';

    protected $rules = [
        // 'uid' => 'required|string|unique:product_tables,uid|max:255',
        'name' => 'required|string|max:255',
        'price' => 'required|integer|min:0',
        'maincat' => 'required|exists:main_categories,id',
        'subcat' => 'required|exists:sub_categories,id',
    ];

    protected $messages = [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصيًا.',
        'name.max' => 'يجب ألا يزيد الاسم عن 255 حرفًا.',
    
        'price.required' => 'حقل السعر مطلوب.',
        'price.integer' => 'يجب أن يكون السعر رقمًا صحيحًا.',
        'price.min' => 'يجب ألا يكون السعر أقل من صفر.',
    
        'maincat.required' => 'حقل التصنيف الرئيسي مطلوب.',
        'maincat.exists' => 'التصنيف الرئيسي المحدد غير موجود.',
    
        'subcat.required' => 'حقل التصنيف الفرعي مطلوب.',
        'subcat.exists' => 'التصنيف الفرعي المحدد غير موجود.',
    ];
    
    public function render()
    {
       
        $cat=MainCategory::where('stute',1)->get();
        $subcat=SubCategory::where('id_maincategory',$this->maincat)->where('stute',1)->get();
        $this->records = ProductTable::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.product',['cat'=>$cat,'scat'=>$subcat]);
    }


    public function resetFields()
    {
        $this->name = '';
        $this->price = 0;
        $this->stute = false;
        $this->maincat = 0;
        $this->subcat = 0;
        $this->recordId = null;
    }

    public function store()
    {
        // $this->uid=Str::uuid();
        // dd( $this->uid);
        $this->validate();
        
        $d=new ProductTable();
        $d->name=$this->name;
        $d->uid=Str::uuid();

        $d->price=$this->price;
        $d->id_main_cat=$this->maincat;
        $d->id_sub_cat=$this->subcat;
        $d->save();

        $this->resetFields();
    }


    public function edit($id)
    {
        $record = ProductTable::findOrFail($id);
        $this->recordId = $record->id;
        $this->name = $record->name;
        $this->price = $record->price;
        $this->maincat = $record->id_main_cat;
        $this->subcat = $record->id_sub_cat;
        $this->stute = $record->stute;
    }

    public function update()
    {
       
        $this->validate();
        $record = ProductTable::findOrFail($this->recordId);
        // dd($record);
        $record->name=$this->name;
        $record->price=$this->price;
        $record->id_main_cat=$this->maincat;
        $record->id_sub_cat=$this->subcat;
        $record->save();

        $this->resetFields();
    }

    public function toggleStute($id)
    {
        $record = ProductTable::findOrFail($id);
        $record->stute= !$record->stute;
        $record->save();
    }

}

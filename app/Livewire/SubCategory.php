<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainCategory;
use App\Models\SubCategory as SubCategoryTable ;

class SubCategory extends Component
{
    public $records;
    public $name;
    public $id_main;
    public $stute = false;
    public $recordId = null;
    public $search = '';
    protected $rules = [
        'name' => 'required|string|max:255',
        'id_main' => 'required|integer|exists:main_categories,id',
        'stute' => 'boolean',
    ];
    public function render()
    {

        $cat=MainCategory::where('stute',1)->get();
        $this->records = SubCategoryTable::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.sub-category',['cat'=>$cat]);
    }

    public function resetFields()
    {
        $this->name = '';
        $this->stute = false;
        $this->recordId = null;
        $this->id_main = 0;
    }

    public function store()
    {
        $this->validate();
        // dd($this->id_main);
        $d=new SubCategoryTable();
        $d->name=$this->name;
        $d->id_maincategory=$this->id_main;
        $d->save();

        $this->resetFields();
    }

    public function edit($id)
    {
        $record = SubCategoryTable::findOrFail($id);
        $this->recordId = $record->id;
        $this->name = $record->name;
        $this->id_main = $record->id_maincategory;
        $this->stute = $record->stute;
    }

    public function update()
    {
        $this->validate();

        $record = SubCategoryTable::findOrFail($this->recordId);
        $record->name=$this->name;
        $record->id_maincategory=$this->id_main;
        $record->save();

        $this->resetFields();
    }

    public function toggleStute($id)
    {
        $record = SubCategoryTable::findOrFail($id);
        $record->stute= !$record->stute;
        $record->save();
    }


}

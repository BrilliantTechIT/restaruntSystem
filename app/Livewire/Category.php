<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MainCategory;
class Category extends Component
{
    public $records;
    public $name;
    public $stute = false;
    public $recordId = null;
    public $search = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'stute' => 'boolean',
    ];

    protected $messages = [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصيًا.',
        'name.max' => 'يجب ألا يزيد الاسم عن 255 حرفًا.',
    
        'stute.boolean' => 'يجب أن تكون الحالة صحيحة أو خاطئة فقط.',
    ];
    public function render()
    {
        $this->records = MainCategory::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.category');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->stute = false;
        $this->recordId = null;
    }

    public function store()
    {
        $this->validate();
        // dd($this->name);
        $d=new MainCategory();
        $d->name=$this->name;
        $d->save();

        $this->resetFields();
    }

    public function edit($id)
    {
        $record = MainCategory::findOrFail($id);
        $this->recordId = $record->id;
        $this->name = $record->name;
        $this->stute = $record->stute;
    }

    public function update()
    {
        $this->validate();

        $record = MainCategory::findOrFail($this->recordId);
        $record->name=$this->name;
        $record->save();

        $this->resetFields();
    }

    public function toggleStute($id)
    {
        $record = MainCategory::findOrFail($id);
        $record->stute= !$record->stute;
        $record->save();
    }

    // public function delete($id)
    // {
    //     MainCategory::findOrFail($id)->delete();
    // }
}

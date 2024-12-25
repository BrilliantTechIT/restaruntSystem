<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Offers as Offerstable;
// use App\Models\Offersproducts;
use Str;
class Offers extends Component
{
    public $name;
    public $price;
    public $uid;
    public $startdate;
    public $enddate;
    public $records;
    public $stute = false;
    public $recordId = null;
    public $search = '';
    public $offerproducts;


    protected $rules = [
        // 'uid' => 'required|string|unique:your_table_name,uid|max:255',
        'name' => 'required|string|max:255',
        'stute' => 'required|boolean',
        'price' => 'required|integer|min:0',
        'startdate' => 'required|date|before_or_equal:enddate',
        'enddate' => 'required|date|after_or_equal:startdate',
    ]  ;
    protected $messages = [
        'name.required' => 'حقل الاسم مطلوب.',
        'name.string' => 'يجب أن يكون الاسم نصيًا.',
        'name.max' => 'يجب ألا يزيد الاسم عن 255 حرفًا.',
        
        'stute.required' => 'حقل الحالة مطلوب.',
        'stute.boolean' => 'يجب أن تكون الحالة إما صحيحة أو خاطئة.',
    
        'price.required' => 'حقل السعر مطلوب.',
        'price.integer' => 'يجب أن يكون السعر رقمًا صحيحًا.',
        'price.min' => 'يجب ألا يكون السعر أقل من 0.',
    
        'startdate.required' => 'حقل تاريخ البدء مطلوب.',
        'startdate.date' => 'يجب أن يكون تاريخ البدء تاريخًا صالحًا.',
        'startdate.before_or_equal' => 'يجب أن يكون تاريخ البدء قبل أو مساويًا لتاريخ الانتهاء.',
    
        'enddate.required' => 'حقل تاريخ الانتهاء مطلوب.',
        'enddate.date' => 'يجب أن يكون تاريخ الانتهاء تاريخًا صالحًا.',
        'enddate.after_or_equal' => 'يجب أن يكون تاريخ الانتهاء بعد أو مساويًا لتاريخ البدء.',
    ];
    
    public function render()
    {
        $this->records = Offerstable::where('name', 'like', '%' . $this->search . '%')->get();

        return view('livewire.offers');
    }

    public function resetFields()
    {
        $this->name = '';
        $this->price = 0;
        $this->stute = false;
        $this->startdate=null ;
        // $this->enddate =null;
        $this->recordId = null;
    }


    public function store()
    {
        // $this->uid=Str::uuid();
        // dd( $this->uid);
        $this->validate();
        
        $d=new Offerstable();
        $d->name=$this->name;
        $d->uid=Str::uuid();
        $d->price=$this->price;
        $d->startdate=$this->startdate;
        $d->enddate=$this->enddate;
        $d->save();

        $this->resetFields();
    }


    public function edit($id)
    {
        $record = Offerstable::findOrFail($id);
        $this->recordId = $record->id;
        $this->name = $record->name;
        $this->price = $record->price;
        $this->startdate = $record->startdate;
        $this->enddate = $record->enddate;
        $this->stute = $record->stute;
    }

    public function update()
    {
       
        $this->validate();
        $record = Offerstable::findOrFail($this->recordId);
        // dd($record);
        $record->name=$this->name;
        $record->price=$this->price;
        $record->startdate=$this->startdate;
        $record->enddate=$this->enddate;
        $record->save();

        $this->resetFields();
    }

    public function toggleStute($id)
    {
        $record = Offerstable::findOrFail($id);
        $record->stute= !$record->stute;
        $record->save();
    }
}

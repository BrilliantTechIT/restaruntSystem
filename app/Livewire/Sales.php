<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProductTable;
use App\Models\Salestable;
use App\Models\Salesproduct;
use App\Models\DiscountsTable;
use Str;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
class Sales extends Component
{
    public $allp=[];
    public $qun=[];
    public $onequn=1;
    public $total=0;
    public $dis=0;
    public $paid=0;
    public $note;
    public $customer='عام';
    public $search='';
    use WithPagination, WithoutUrlPagination; 
    protected $rules = [
        'customer' => 'required|string|max:255',
        'total' => 'required|numeric|min:0',
        'paid' => 'required|numeric|min:0',
        'dis' => 'nullable|numeric|min:0',
    ];
    
    protected $messages = [
        'customer.required' => 'حقل اسم العميل مطلوب.',
        'total.required' => 'حقل الإجمالي مطلوب.',
        'total.numeric' => 'الإجمالي يجب أن يكون رقمًا.',
        'paid.required' => 'حقل المدفوع مطلوب.',
        'paid.numeric' => 'حقل المدفوع يجب أن يكون رقمًا.',
        'paid.max' => 'المدفوع لا يمكن أن يكون أكبر من الإجمالي.',
        'dis.numeric' => 'حقل الخصم يجب أن يكون رقمًا.',
    ];
    public function render()
    {
        $oldse=Salestable::orderby('id','desc')->paginate(30);
        $this->total=0;
        $d=ProductTable::Where('name','like','%'.$this->search.'%')->Where('stute',1)->get();
        foreach ($this->allp as $key => $value) {
            $this->total= (int)($this->total+$value->price*$this->qun[$key])-(float)$this->dis;
        }
        $di=DiscountsTable::first();
        if($di)
        {
            $this->dis=$this->total*$di->n/100;
            $this->total=$this->total-($this->total*$di->n/100);
        }
        // dd($this->total);

        $this->paid=$this->total;
        return view('livewire.sales',['pro'=>$d,'oldse'=>$oldse]);
    }
    

    public function add($id)
    {
        $p=ProductTable::find($id);
        $this->allp[]=$p;
        // dd($this->onequn);
        $this->qun[]=$this->onequn;
       

    }

    public function save()
    {
        $this->validate();
        // dd($this->total);
        
        $validatedData = $this->validate([
            'allp' => 'required|array|min:1',
        ],
    [
        'allp.required' => 'يجب ان يكون في الفاتورة عنصر على الاقل',
        'allp.array' => 'يجب ان يكون في الفاتورة عنصر على الاقل',
    ]);
        $uid=Str::uuid();
        $d = new Salestable(); // Create a new instance of the model
        $d->uid = $uid; // Set the unique identifier
        $d->customer = $this->customer; // Set the customer name
        $d->total = $this->total; // Set the total amount
        $d->paid = $this->paid; // Set the paid amount
        $d->dis = $this->dis; // Set the discount
        $d->note = $this->note; // Set a note (optional)
        $d->save(); // Save the record to the databas
        foreach ($this->allp as $key => $value) {
         $p=new Salesproduct();
         $p->id_p=$value->id;
         $p->id_bill=$uid;
         $p->count=$this->qun[$key];
         $p->price=$value->price;
         $p->save();
        }

        $this->dispatch('print',  $uid);


        $this->reset();

        session()->flash('success', 'تم إضافة البيع بنجاح!');
    }
}

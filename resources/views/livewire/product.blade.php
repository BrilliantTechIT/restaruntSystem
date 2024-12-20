<div>
    <div class="container" dir="rtl" style="text-align: right">
        <form wire:submit.prevent="{{ $recordId ? 'update' : 'store' }}" method="post">
            <div class="row" style="margin-top: 80px">
                <div class="col-md-6 col-12">
                    <label for="">الصنف الرئيسي</label>
                    <select name="" wire:model.live='maincat' id="" class="form-control">
                        <option value="0">اختار صنف رئيسي</option>
                        @foreach ($cat as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('maincat') <span>{{ $message }}</span> @enderror
                </div>


                <div class="col-md-6 col-12">
                    <label for="">الصنف الفرعي</label>
                    <select name="" wire:model='subcat' id="" class="form-control">
                        <option value="0">اختار صنف الفرعي</option>
                        @foreach ($scat as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('subcat') <span>{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 col-12">
                    <label for="">اسم المنتج</label>
                    <input type="text" class="form-control"  wire:model="name"  name="" id="">
                    @error('name') <span>{{ $message }}</span> @enderror
                    
                </div>


                <div class="col-md-6 col-12">
                    <label for="">سعر المنتج</label>
                    <input type="text" class="form-control"  wire:model="price"  name="" id="">
                    @error('price') <span>{{ $message }}</span> @enderror
                    
                </div>

                <div class="col-12">
                    <center>
                        <span style="padding-top: 10px"><button>{{ $recordId ? 'تعديل' : 'حفظ' }}</button></span>
                        <button type="button" wire:click="resetFields">تهيئة</button>
    
                    </center>
                </div>
            </div>
        </form>
    
             <div class="row">
                <div class=" col-12">
                    <table class="table table-striped table-bordered">
                        <thead style="background-color: orange; color: white;">
                            <tr>
                                <td colspan="6" class="p-4">
                                    <input type="text" placeholder="البحث هنا" wire:model.live='search' class="form-control" name="" id="">
                                </td>
                            </tr>
                            <tr>
                                <th>اسم المنتج </th>
                                <th>سعر المنتج </th>
                                <th>اسم الصنف الرئيسي </th>
                                <th>اسم الصنف الفرعي </th>
                                <th>حالة المنتج</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                                <tr>
                                    <td>{{ $record->name }}</td>
                                    <td>{{ $record->price }}</td>
                                    <td>{{ $record->mainCategory->name }}</td>
                                    <td>{{ $record->subCategory->name }}</td>
                                    <td>
                                        <span class="badge {{ $record->stute ? 'bg-success' : 'bg-danger' }}">
                                            {{ $record->stute ? 'نشط' : 'غير نشط' }}
                                        </span>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary btn-sm"
                                            wire:click="edit({{ $record->id }})">تعديل</button>
                                        <button class="btn btn-warning btn-sm"
                                            wire:click="toggleStute({{ $record->id }})">تغيير حالة النشاط</button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                </div>
             </div>
            
    </div>
</div>

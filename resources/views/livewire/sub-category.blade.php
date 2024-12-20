<div>
    <div class="container" dir="rtl" style="text-align: right">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-6 col-12">
                <form wire:submit.prevent="{{ $recordId ? 'update' : 'store' }}">
                    <label for="">الصنف الرئيسي</label>
                    <select name="" wire:model='id_main' id="" class="form-control">
                        <option value="0">اختار صنف رئيسي</option>
                        @foreach ($cat as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    @error('id_main') <span>{{ $message }}</span> @enderror
                    <br>

                    <label for="">اسم الصنف</label>
                    <input type="text" class="form-control"  wire:model="name"  name="" id="">
                    @error('name') <span>{{ $message }}</span> @enderror
                    <center>
                        <span style="padding-top: 10px"><button>{{ $recordId ? 'تعديل' : 'حفظ' }}</button></span>
                        <button type="button" wire:click="resetFields">تهيئة</button>

                    </center>
                </form>
            </div>

            <div class="col-md-6 col-12">
                <table class="table table-striped table-bordered">
                    <thead style="background-color: orange; color: white;">
                        <tr>
                            <td colspan="4" class="p-4">
                                <input type="text" placeholder="البحث هنا" wire:model.live='search' class="form-control" name="" id="">
                            </td>
                        </tr>
                        <tr>
                            <th>اسم الصنف </th>
                            <th>اسم الصنف الرئيسي </th>
                            <th>حالة الصنف</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($records as $record)
                            <tr>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->mainCategory->name }}</td>
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

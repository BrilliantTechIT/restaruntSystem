<div>
    <div class="container" dir="rtl" style="text-align: right">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-6 col-12">
                <label for="">الصنف الرئيسي</label>
                <select name="" wire:model.live='main' id="" class="form-control">
                    <option value="0">اختار صنف رئيسي</option>
                    @foreach ($maincat as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('maincat')
                    <span>{{ $message }}</span>
                @enderror
            </div>


            <div class="col-md-6 col-12">
                <label for="">الصنف الفرعي</label>
                <select name="" wire:model.live='sub' id="" class="form-control">
                    <option value="0">اختار صنف الفرعي</option>
                    @foreach ($subcat as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('subcat')
                    <span>{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                <label for=""> المنتج</label>
                <div class="row">
                    <div class=" col-12">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: orange; color: white;">
                                <tr>
                                    <td colspan="7" class="p-4">
                                       
                                        <input type="text" placeholder="البحث هنا" wire:model.live='search'
                                            class="form-control" name="" id="">
                                        @if (session('success'))
                                            <center style="width: 100%">
                                                <h2 class="text-success p-4 alert-success">
                                                    {{ session()->get('success') }}
                                                </h2>

                                            </center>
                                        @endif
                                    </td>


                                </tr>
                                <tr>
                                    <th>اسم المنتج </th>
                                    <th>سعر المنتج </th>
                                    <th>اسم الصنف الرئيسي </th>
                                    <th>اسم الصنف الفرعي </th>
                                    <th>الكمية </th>
                                    <th>حالة المنتج</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $record)
                                    <form wire:submit='Store({{ $record->id }})' method="post">
                                        <tr>
                                            <td>{{ $record->name }}</td>
                                            <td>{{ $record->price }}</td>
                                            <td>{{ $record->mainCategory->name }}</td>
                                            <td>{{ $record->subCategory->name }}</td>
                                            <td><input wire:model='num' type="text" class="form-control"
                                                    name="" id=""></td>
                                            <td>
                                                <span class="badge {{ $record->stute ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $record->stute ? 'نشط' : 'غير نشط' }}
                                                </span>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary btn-sm">اضافة الى قائمة
                                                    العرض</button>


                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>


            <div class="col-12">
                <label for=""> قائمة العرض</label>
                <div class="row">
                    <div class=" col-12">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color: orange; color: white;">
                                <tr>
                                    <td colspan="7" class="p-4">
                                        <input type="text" placeholder="البحث هنا" wire:model.live='search'
                                            class="form-control" name="" id="">

                                    </td>


                                </tr>
                                <tr>
                                    <th>اسم المنتج </th>
                                    <th>سعر المنتج </th>
                                    <th>اسم الصنف الرئيسي </th>
                                    <th>اسم الصنف الفرعي </th>
                                    <th>الكمية </th>
                                    <th>حالة المنتج</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($of as $record)
                                    <form wire:submit='Store({{$record->id_product}})'  method="post">
                                        <tr>
                                            <td>{{ $record->product->name }}</td>
                                            <td>{{ $record->product->price }}</td>
                                            <td>{{ $record->product->mainCategory->name }}</td>
                                            <td>{{ $record->product->subCategory->name }}</td>
                                            <td>{{ $record->number }}</td>
                                            
                                            <td>
                                                <span class="badge {{ $record->product->stute ? 'bg-success' : 'bg-danger' }}">
                                                    {{ $record->product->stute ? 'نشط' : 'غير نشط' }}
                                                </span>
                                            </td>
                                            <td>
                                                <button wire:confirm='هل حقاً تريد الحذف' wire:click='Delete("{{$record->id}}")'   class="btn btn-danger btn-sm">حذف من  قائمة
                                                    العرض</button>


                                            </td>
                                        </tr>
                                    </form>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

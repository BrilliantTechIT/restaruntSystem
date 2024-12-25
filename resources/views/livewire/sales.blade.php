<div>
    @php

    @endphp
    <div class="container" dir="rtl" style="text-align: right">
        <div class="row" style="margin-top: 80px">
            <div class="col-md-6 col-12">
                <label for="">اسم العميل</label>
                <input wire:model='customer' type="text" class="form-control" name="" id="">
                @error('customer') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="col-md-6 col-12">
                {{-- <label for="">اسم العميل</label>
                <input wire:model='customer' type="text" class="form-control" name="" id=""> --}}
            </div>

            <div class="col-md-6 col-12">
                <label for="">بحث</label>
                <input wire:model.live='search' type="text" class="form-control" name="" id="">
            </div>


            <div class="col-12">
                <div class="row">
                    @error('allp') <span class="text-danger">{{ $message }}</span> @enderror
                    @foreach ($pro as $item)
                        <div class="col-md-4 col-12">
                            <div class="card p-2">
                                <form wire:submit='add({{ $item->id }})' method="post">
                                    <h5>{{ $item->id }}</h5>
                                    <h5>{{ $item->name }}</h5>
                                    <h6>السعر:{{ $item->price }}</h6>
                                    <label for="">الكمية</label>
                                    <input placeholder="الكمية" wire:model='onequn' type="text" name=""
                                        id="">
                                    <button>اضافة</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-12">
                <form wire:submit='save' method="post">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>
                                    رقم الوجبة
                                </th>
                                <th>
                                    اسم الوجبة
                                </th>
                                <th>
                                    الكمية
                                </th>

                                <th>
                                    السعر
                                </th>

                                <th>
                                    الاجمالي
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allp as $key => $item)
                                <tr>
                                    <td>
                                        {{-- <input  type="hidden" name="" id=""> --}}
                                        <input readonly value="{{ $item->id }}" type="text" class="form-control"
                                            name="" id="">
                                    </td>
                                    <td>
                                        <input readonly value="{{ $item->name }}" type="text" class="form-control"
                                            name="" id="">
                                    </td>

                                    <td>
                                        <input readonly value="{{ $qun[$key] }}" type="text" class="form-control"
                                            name="" id="">
                                    </td>
                                    <td>
                                        <input readonly value="{{ $item->price }}" type="text" class="form-control"
                                            name="" id="">
                                    </td>

                                    <td>
                                        <input readonly value="{{ $item->price * $qun[$key] }}" readonly type="text"
                                            class="form-control" name="" id="">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6 con-12">
                            <label for="">الاجمالي</label>
                            <input wire:model.live='total' readonly type="number" class="form-control" name=""
                                id="">
                                @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6 con-12">
                            <label for="">المدفوع</label>
                            <input wire:model.live='paid' type="text" class="form-control" name=""
                                id="">
                                @error('paid') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6 con-12">
                            <label for="">الخصم</label>
                            <input wire:model.live='dis' type="text" class="form-control" name=""
                                id="">
                                @error('dis') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-md-6 con-12">
                            <label for="">سبب الخصم</label>
                            <input wire:model='note' type="text" class="form-control" name="" id="">
                        </div>
                        <div class="col-12">
                            <center>
                                <button type="submit">حفظ و طباعة</button>
                            </center>
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>

                    </div>

                </form>
            </div>


        </div>
        <script>
          document.addEventListener('livewire:init', function () {
        Livewire.on('print', event => {
        // console.log(event);
        window.open('/print/'+event[0], '_blank');

           
        });
    });
        </script>
    </div>

  
    
</div>

@extends('layouts.master')
@section('title')
    تعديل طلب شراء
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">طلبات اصدار دفعة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل طلب شراء</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <form method="post" action="{{ route('payment.purchase.update', $purchases->id) }}">
        @csrf

        <input type="hidden" name="id" value=" {{ $purchases->id }} ">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>السادة</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="gentlemen" value="{{ $purchases->gentlemen }}" placeholder="اسم السادة...">
                    @error('gentlemen')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>عناية الاستاذ</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="professor_care" value="{{ $purchases->professor_care }}" placeholder="عناية الاستاذ...">
                    @error('professor_care')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم طلب المواد</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="order_material_id" value="{{ $purchases->id }}" readonly>
                    @error('order_material_id')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>تاريخ طلب الشراء</label><span style="color: red;">  *</span>
                    <input type="date" class="form-control" name="order_purchase_date" value="{{ $purchases->order_purchase_date }}" placeholder="التاريخ...">
                    @error('order_purchase_date')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>اسم المشروع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="project_name" value="{{ $purchases->project_name }}" readonly>
                    @error('project_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم المشروع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="project_number" value="{{ $purchases->project_number }}" readonly>
                    @error('project_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>العنوان</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="address" value="{{ $purchases->address }}" placeholder="العنوان...">
                    @error('address')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم التلفون</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="phone_number" value="{{ $purchases->phone_number }}" placeholder="رقم التلفون...">
                    @error('phone_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الايميل</label><span style="color: red;">  *</span>
                    <input type="email" class="form-control" name="email" value="{{ $purchases->email }}" placeholder="الايميل...">
                    @error('email')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الموضوع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="subject" value="{{ $purchases->subject }}" placeholder="الموضوع...">
                    @error('subject')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>المخصص المالي</label>
                    <input type="text" class="form-control" name="financial_provision"
                           value="{{ $purchases->financial_provision }}" placeholder="المخصص المالي...">
                    @error('financial_provision')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الرقم</label>
                    <input type="text" class="form-control" name="number" value="{{ $purchases->number }}"
                           placeholder="الرقم...">
                    @error('financial_provision')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <hr>
        @foreach($multi_purchase as $key => $multi)
            <input type="hidden" name="multi[]" value="{{$multi->id }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>البيان</label>
                        <input type="text" class="form-control" name="purchase_name[]"
                               value="{{ $multi->purchase_name }}" placeholder="البيان...">
                        @error('purchase_name')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الكمية</label>
                        <input type="text" class="quantity{{$key+1}} form-control" id="quantity" name="quantity[]"
                               value="{{ $multi->quantity }}" placeholder="الكمية...">
                        @error('quantity')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الوحدة</label>
                        <input type="text" class="form-control" name="unit[]"
                               value="{{ $multi->unit }}" placeholder="الوحدة...">
                        @error('unit')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>رقم الموديل</label>
                        <input type="text" class="form-control" name="model_number[]"
                               value="{{ $multi->model_number }}" placeholder="رقم الموديل ...">
                        @error('model_number')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>السعر</label><span style="color: red;">  *</span>
                        <input type="text" class="price{{$key+1}} form-control" name="price[]" id="price"
                               value="{{ $multi->price }}" placeholder="السعر...">
                        @error('price')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الاجمالي</label><span style="color: red;">  *</span>
                        <input type="text" class="total_price form-control" name="total_price[]" id="total_price{{$key+1}}"
                               value="{{ $multi->total_price }}" placeholder="المجموع..." readonly>
                        @error('total')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>المجموع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="total" id="total" value="{{ $purchases->total }}" placeholder="المجموع..." readonly>
                    @error('total')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الخصم</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="discount" value="{{ $purchases->discount }}" id="discount" placeholder="الخصم...">
                    @error('discount')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الاجمالي بعد الخصم</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="total_discount" id="total_discount" value="{{ $purchases->total_discount }}" placeholder="الاجمالي بعد الخصم..." readonly>
                    @error('total_discount')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الضريبة المضافة(15%)</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="added_vat" id="added_vat" value="{{ $purchases->added_vat }}" placeholder="قيمة الضريبة المضافة..." readonly>
                    @error('added_vat')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>الاجمالي بعد الضريبة</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="total_vat" id="total_vat" value="{{ $purchases->total_vat }}" placeholder="الاجمالي بعد الضريبة..." readonly>
                    @error('total_vat')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>موقع التسليم</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="delivery_location" value="{{ $purchases->delivery_location }}" placeholder="موقع التسليم...">
                    @error('delivery_location')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>تاريخ التسليم</label><span style="color: red;">  *</span>
                    <input type="date" class="form-control" name="delivery_date" value="{{ $purchases->delivery_date }}" placeholder="تاريخ التسليم...">
                    @error('delivery_date')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">شروط السداد</label> <span style="color: red;">  *</span><br>
                    <input type="radio" name="terms_payment" id="option1" value="partial"
                           onclick="showDescriptionField()" @if ($purchases->terms_payment == 'partial') checked @endif> جزئي

                    <input type="radio" name="terms_payment" id="option2" value="total"
                           onclick="hideDescriptionField()"  @if ($purchases->terms_payment == 'total') checked @endif/> كلي
                    @error('terms_payment')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div id="descriptionField" @if ($purchases->terms_payment == 'partial') style="display: block;" @else style="display: none;" @endif>
                        <div class="form-group">
                            <label for="description">ملاحظات</label>
                            <textarea id="description" name="description"  class="form-control" placeholder="ادخل ملاحظات...">
                                {{ $purchases->description }}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <input type="submit" class="btn btn-info" value="تعديل طلب الشراء">
        </div>
        <br>
    </form>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <script>
        function showDescriptionField() {
            var descriptionField = document.getElementById("descriptionField");
            descriptionField.style.display = "block";
        }

        function hideDescriptionField() {
            var descriptionField = document.getElementById("descriptionField");
            descriptionField.style.display = "none";
        }
    </script>
    <script>
        $(document).on('input', '#quantity', function(res,e) {
            var quantityID = res.target.className.split(' ');
            quantityID = quantityID[0]
            let number = quantityID.match(/\d+/g);
            number = number[0];
            myFunction(quantityID,`price${number}`, `total_price${number}`);
        });

        $(document).on('input', '#price', function(res,e) {
            var priceID = res.target.className.split(' ');
            priceID = priceID[0]
            let number = priceID.match(/\d+/g);
            number = number[0];
            myFunction(`quantity${number}`,priceID, `total_price${number}`);
        });

        $(document).on('input', '#discount', function(e) {
            myFunction();
        });


        function myFunction( quantityID , priceID, total_price ){
            var quantity = $(`.${quantityID}`).val();
            var price = $(`.${priceID}`).val();

            // console.log(quantity)
            // console.log(price)
            // console.log("===========================")

            if(price == "") price=0;
            $(`#${total_price}`).val(parseFloat(quantity) * parseFloat(price));


            if($("#discount").val() == "") $("#discount").val(0);
            var inputs = document.querySelectorAll('.total_price');
            var sum = 0
            inputs.forEach(function(input) {
                var value = input.value;
                sum += parseFloat(value)
            });
            $("#total").val(sum)
            var total = parseFloat($("#total").val());
            var discount = parseFloat($("#discount").val());
            var total_discount = total - discount;

            var vat = `15`;
            var vat2 = `0.${vat}`
            var vatt = `1.${vat}`;
            // console.log(total_discount + "\n" + total + "\n" + discount)

            $("#total_discount").val(total_discount);
            $("#added_vat").val((total_discount * vat2).toFixed(2));
            $("#total_vat").val((total_discount * vatt).toFixed(2));

        }
    </script>
@endsection

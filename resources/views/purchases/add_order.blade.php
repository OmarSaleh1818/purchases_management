@extends('layouts.master')
@section('title')
    اضافة طلب مواد
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مشتريات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة طلب مواد</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

        <form method="post" action="{{ route('purchases.store') }}">
            @csrf
            <input type="hidden" name="company" id="company_id">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>اختيار اسم الشركة <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="company_id" class="form-control">
                                <option value="" selected="" disabled="">اختيار اسم الشركة</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>اختيار اسم الفرع <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subcompany_id" class="form-control">
                                <option value="" selected="" disabled="">اختيار اسم الفرع</option>

                            </select>
                            @error('subcompany_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <h5>اسم المشروع <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="subsubcompany_id" class="form-control">
                                <option value="" selected="" disabled="">اختيار اسم المشروع</option>

                            </select>
                            @error('subsubcompany_id')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الاستاذ</label><span style="color: red;">  *</span>
                        <input type="text" class="form-control" name="teacher_name" required placeholder="اسم الاستاذ...">
                        @error('teacher_name')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>المخصص المالي</label>
                        <input type="text" class="form-control" name="financial_provision" placeholder="المخصص المالي...">
                        @error('financial_provision')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>الرقم</label>
                        <input type="text" class="form-control" name="number" placeholder="الرقم...">
                        @error('financial_provision')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>التاريخ</label><span style="color: red;">  *</span>
                        <input type="date" class="form-control" id="dateInput" required name="date"  placeholder="التاريخ...">
                        @error('date')
                        <span class="text-danger"> {{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <hr>

            <div class="main-form mt-3 border-bottom">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label>البيان</label><span style="color: red;">  *</span>
                            <input type="text" class="form-control" name="purchase_name[]" required placeholder="البيان...">
                            @error('purchase_name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label>الكمية</label><span style="color: red;">  *</span>
                            <input type="text" class="form-control" name="quantity[]" placeholder="الكمية...">
                            @error('quantity')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label>الوحدة</label><span style="color: red;">  *</span>
                            <input type="text" class="form-control" name="unit[]" placeholder="الوحدة...">
                            @error('unit')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label>رقم الموديل</label><span style="color: red;">  *</span>
                            <input type="text" class="form-control" name="model_number[]" placeholder="رقم الموديل...">
                            @error('model_number')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <h4>
                <a href="javascript:void(0)" class="add-more-form float-left btn btn-primary">ADD MORE</a>
            </h4>
            <br>

            <div class="paste-new-forms"></div>

            <div class="d-flex justify-content-between">
                <input type="submit" class="btn btn-info" value="ارسال الطلب">
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
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        var data = localStorage.getItem('id');
        $("#company_id").val(data)
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="company_id"]').on('change',function() {
                var company_id = $(this).val();
                if(company_id) {
                    $.ajax({
                        url: "{{ url('/company/subcompany/ajax') }}/"+company_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            $('select[name="subsubcompany_id"]').html('');
                            var d =$('select[name="subcompany_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcompany_id"]').append('<option value="'+ value.id + '">' + value.subcompany_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });

            $('select[name="subcompany_id"]').on('change',function() {
                var subcompany_id = $(this).val();
                if(subcompany_id) {
                    $.ajax({
                        url: "{{ url('/company/sub-subcompany/ajax') }}/"+subcompany_id,
                        type:"GET",
                        dataType:"json",
                        success:function(data) {
                            var d =$('select[name="subsubcompany_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subsubcompany_id"]').append('<option value="'+ value.id + '">' +
                                    value.subsubcompany_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    <script>
        // Select the input field
        var input = document.getElementById('dateInput');

        // Create a new Date object for the current date
        var currentDate = new Date();

        // Format the date as YYYY-MM-DD for the input value
        var formattedDate = currentDate.toISOString().split('T')[0];

        // Set the initial value of the input field to the current date
        input.value = formattedDate;

        // Add an event listener to allow the user to change the date
        input.addEventListener('input', function(event) {
        var selectedDate = event.target.value;
        console.log(selectedDate); // Output the selected date
        });
        </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(document).on('click', '.remove-btn', function () {
                $(this).closest('.main-form').remove();
            });

            $(document).on('click', '.add-more-form', function () {
                $('.paste-new-forms').append('<div class="main-form mt-3 border-bottom">\
                    <div class="row">\
                        <div class="col-md-4">\
                            <div class="form-group mb-2">\
                                <label>البيان</label><span style="color: red;">  *</span>\
                                <input type="text" class="form-control" name="purchase_name[]" placeholder="البيان...">\
                                @error('purchase_name')\
                                <span class="text-danger"> {{ $message }}</span>\
                                @enderror\
                            </div>\
                        </div>\
                        <div class="col-md-2">\
                            <div class="form-group mb-2">\
                                <label>الكمية</label><span style="color: red;">  *</span>\
                                <input type="text" class="form-control" name="quantity[]" placeholder="الكمية...">\
                                @error('quantity')\
                                <span class="text-danger"> {{ $message }}</span>\
                                 @enderror\
                            </div>\
                        </div>\
                        <div class="col-md-2">\
                            <div class="form-group mb-2">\
                                <label>الوحدة</label><span style="color: red;">  *</span>\
                                <input type="text" class="form-control" name="unit[]" placeholder="الوحدة...">\
                                @error('unit')\
                                <span class="text-danger"> {{ $message }}</span>\
                                @enderror\
                            </div>\
                        </div>\
                        <div class="col-md-2">\
                            <div class="form-group mb-3">\
                                <label>رقم الموديل</label><span style="color: red;">  *</span>\
                                <input type="text" class="form-control" name="model_number[]" placeholder="رقم الموديل...">\
                                @error('model_number')\
                                <span class="text-danger"> {{ $message }}</span>\
                                @enderror\
                             </div>\
                        </div>\
                        <div class="col-md-2">\
                            <div class="form-group mb-2">\
                                <br>\
                                <button type="button" class="remove-btn btn btn-danger">Remove</button>\
                            </div>\
                        </div>\
                    </div>\
                </div>');
            });
        });
    </script>
@endsection

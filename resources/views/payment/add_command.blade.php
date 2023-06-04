@extends('layouts.master')
@section('title')
    اضافة امر دفع
@endsection
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">مشتريات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة امر دفع</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    <form method="post" action="{{ route('command.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>التاريخ</label><span style="color: red;">  *</span>
                    <input type="date" class="form-control" name="date" placeholder="التاريخ...">
                    @error('date')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>الرقم</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="payment_number" placeholder="الرقم...">
                    @error('payment_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>المستفيد</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="benefit_name" placeholder="المستفيد...">
                    @error('benefit_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>المبلغ</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="price" placeholder="المبلغ...">
                    @error('price')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>نوع العملة</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="currency_type" placeholder="نوع العملة...">
                    @error('currency_type')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>فقط</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="just" placeholder="فقط...">
                    @error('just')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>البنك المسحوب عليه</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="bank_name" placeholder="البنك المسحوب عليه...">
                    @error('bank_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم الشيك</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="check_number" placeholder="الوحدة...">
                    @error('check_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم الايبان</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="iban_number" placeholder="رقم الايبان...">
                    @error('iban_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>البيان</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="purchase_name" placeholder="البيان...">
                    @error('purchase_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>المشروع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="project_name" placeholder="اسم المشروع...">
                    @error('project_name')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم المشروع</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="project_number" placeholder="رقم المشروع...">
                    @error('project_number')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>المخصص المالي</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="financial_provision" placeholder="المخصص المالي...">
                    @error('financial_provision')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>رقم المخصص المالي</label><span style="color: red;">  *</span>
                    <input type="text" class="form-control" name="number_financial" placeholder="رقم المخصص المالي...">
                    @error('number_financial')
                    <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <input type="submit" class="btn btn-info" value="ارسال امر الدفع">
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
@endsection

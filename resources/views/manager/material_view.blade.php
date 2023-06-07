@extends('layouts.master')
@section('title')
    طلب مواد
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المدير العام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طلبات المواد</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        @if(Session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session()->get('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">ID</th>
                                <th class="border-bottom-0">الفرع</th>
                                <th class="border-bottom-0">المشروع</th>
                                <th class="border-bottom-0">المخصص المالي</th>
                                <th class="border-bottom-0">الاستاذ</th>
                                <th class="border-bottom-0">التاريخ</th>
                                <th class="border-bottom-0">الوحدة</th>
                                <th class="border-bottom-0">مقدم الطلب</th>
                                <th class="border-bottom-0">طباعة</th>
                                <th class="border-bottom-0">التعديل</th>
                                <th class="border-bottom-0">حالة الطلب</th>
                                <th class="border-bottom-0"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($purchases as $key => $purchase)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $purchase['subcompany']['subcompany_name'] }}</td>
                                    <td>{{ $purchase['subsubcompany']['subsubcompany_name'] }}</td>
                                    <td>{{ $purchase->financial_provision }}</td>
                                    <td>{{ $purchase->teacher_name }}</td>
                                    <td>{{ $purchase->date }}</td>
                                    <td>{{ $purchase->teacher_name }}</td>
                                    <td>{{ $purchase->applicant }}</td>
                                    <td>
                                        @if($purchase->status_id == 1)
                                            <a href="{{ route('print.purchase', $purchase->id) }}" class="btn btn-secondary"
                                               title="طباعة"><i class="fa fa-print"></i></a>
                                        @elseif($purchase->status_id == 2)
                                            <a href="{{ route('print.purchase', $purchase->id) }}" class="btn btn-danger"
                                               title="طباعة"><i class="fa fa-print"></i></a>
                                        @else
                                            <a href="{{ route('print.manager.purchase', $purchase->id) }}" class="btn btn-warning"
                                               title="طباعة"><i class="fa fa-print"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('material.edit', $purchase->id) }}" class="btn btn-info"
                                           title="عرض الطلب"><i class="las la-eye"></i></a>
                                        @if($purchase->status_id == 7)
                                        @elseif($purchase->status_id == 3)
                                        @elseif($purchase->status_id == 4)
                                        @else
                                        <a href="{{ route('material.reject', $purchase->id) }}" class="btn btn-danger"
                                           title="رفض الطلب" id="delete"><i class="fa fa-trash"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($purchase->status_id == 7)
                                            <button class="btn btn-success">تم تاكيد الطلب</button>
                                        @elseif($purchase->status_id == 2)
                                            <a href="{{ route('material.sure', $purchase->id) }}" class="btn btn-warning">
                                                تم رفض الطلب
                                            </a>
                                        @elseif($purchase->status_id == 3)
                                            <a href="" class="btn btn-success">تم طلب الشراء</a>
                                        @elseif($purchase->status_id == 4)
                                            <a href="" class="btn btn-danger">تم طلب اصدار دفعة</a>
                                        @else
                                            <a href="{{ route('material.sure', $purchase->id) }}" class="btn btn-primary">تاكيد الطلب</a>
                                        @endif
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this).attr("href");

                Swal.fire({
                    title: 'هل انت متاكد من رفض الطلب ؟',
                    text: "ارفض هذا الطلب",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ارفض الطلب'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'تم رفضه!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });

        });

    </script>
@endsection

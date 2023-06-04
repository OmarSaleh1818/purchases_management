@extends('layouts.master')
@section('title')
    فروع الشركة
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
                <h4 class="content-title mb-0 my-auto">الشركات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ فروع الشركة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if(Session()->has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ Session()->get('status') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        <!--div-->

        <div class="col-xl-8">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">الرقم</th>
                                <th class="border-bottom-0">اسم الشركة</th>
                                <th class="border-bottom-0">الفرع</th>

                                <th class="border-bottom-0">حالة الطلب</th>
                                <th class="border-bottom-0">حالة الطلب</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subcompany as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['company']['company_name'] }}</td>
                                    <td>{{ $item->subcompany_name }}</td>
                                    <td>
                                        <a href="{{ route('subcompany.edit', $item->id) }}" class="btn btn-info"
                                           title="edit data"><i class="las la-pen"></i></a>
                                        <a href="{{ route('subcompany.delete', $item->id) }}" class="btn btn-danger"
                                           title="delete data" id="delete"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>عمر عبدالله</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
        <div class="col-xl-4">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('subcompany.add') }}">
                        @csrf

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

                        <div class="form-group">
                            <label>اسم الفرع</label><span style="color: red;">  *</span>
                            <input type="text" class="form-control" name="subcompany_name" placeholder="اسم الفرع...">
                            @error('subcompany_name')
                            <span class="text-danger"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between">
                            <input type="submit" class="btn btn-info" value="ادخال اسم الفرع">
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
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
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })

            });

        });

    </script>
@endsection

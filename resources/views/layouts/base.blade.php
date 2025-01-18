@extends('layouts.index')
@section('title')
    {{ $head_data['head'] }}
@endsection
@section('content')
    @php
        $user = Auth::user();
        use Carbon\Carbon;
    @endphp
    <!-- Content Header (Page header) -->
    <div class="content-header content-wrapper">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h6 class="m-0"> {{ $head_data['head'] }} </h6>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ $urls['head-link'] }}">{{ $head_data['head2'] }}</a></li>
                        @isset($head_data['head3'])
                            @if ($urls['head-link2'] != null)
                                <li class="breadcrumb-item">
                                    <a href="{{ $urls['head-link2'] }}">{{ $head_data['head3'] }}</a>
                                </li>
                            @endif
                        @endisset
                        <li class="breadcrumb-item active">{{ 'عرض' }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <span id="card-title" class="card-title">{{ $head_data['card-title'] }}@yield('card-title')</span>
                        <div class="card-tools">
                            {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                        </div>
                    </div><!-- /.card-header -->

                    {{-- @include('layouts.base-form') --}}
                    @yield('details')
                    @if (isset($sysVariable))
                        @yield('sys-variables')
                    @else
                        @include('layouts.pop-form')
                        <div class="card-body" id="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div>
                                        @yield('custom-tabs')
                                        @if (!isset($exist['btn_add']))
                                            <input type="hidden" class="url-store" value="{{ $urls['store-form'] }}">
                                            <a href="{{ url('#') }}" class="btn btn-primary add AddBtn"
                                                onclick="openForm()">
                                                <i class="fas fa-plus"></i> {{ $head_data['add'] }}
                                            </a>
                                        @endif
                                        @yield('other-btn')
                                    </div>
                                    @yield('card-body2')
                                    <table id="example1"
                                        class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting number" tabindex="0" aria-controls="example1"
                                                    rowspan="1" colspan="1">
                                                    #
                                                </th>
                                                @foreach ($thead as $th)
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1">
                                                        {{ $th }}
                                                    </th>
                                                @endforeach
                                                @if (isset($exist['events']))
                                                @else
                                                    <th class="sorting" tabindex="0" rowspan="1" colspan="1">
                                                        {{ 'العملية' }}
                                                    </th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @yield('tbody')
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">#</th>
                                                @foreach ($thead as $tf)
                                                    <th rowspan="1" colspan="1">{{ $tf }}</th>
                                                @endforeach
                                                @if (isset($exist['events']))
                                                @else
                                                    <th>{{ 'العملية' }}</th>
                                                @endif
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="links-pagination" class="float-left">
                                        @yield('links-pagination')
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.card-body -->
                    @endif
                </div><!-- /.card -->
            </div><!-- container-fluid -->
        </div><!-- content -->
    </div>
@endsection

@section('script')
    <script>
        function deleteItem(urldelet) {
            var data = {
                "_token": $('input[name=_token]').val(),
            };
            $.ajax({
                type: "DELETE",
                url: urldelet,
                data: data,
                // dataType: "data"
                success: function(response) {
                    if (response.status == 1) {
                        swal(response.msg, {
                                icon: "success",
                                button: "Ok",
                            })
                            .then((result) => {
                                location.reload();
                            });
                    } else {
                        swal(response.msg, {
                            icon: "error",
                            button: "Ok",
                        })
                        // .then((result) => {
                        //     location.reload();
                        // });
                    }
                },
                error: function(response) {
                    console.log('error: function(response)');
                    if (response.responseJSON.message) {
                        // swal('Error', response.responseJSON.message,
                        //     'error');
                        swal(response.responseJSON.message, {
                            icon: "error",
                            button: "Ok",
                        });
                    }
                }
            });
        }
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.DeleteBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).closest("tr").find('.id').val();
                var urldelet = $(this).closest("tr").find('.url-delet').val();
                // var id2 = $(this).closest("tr").find('.id2').val();
                // var id3 = $(this).closest("tr").find('.id3').val();
                console.log(urldelet);
                swal({
                        title: "Are you sure to delete selected item?",
                        text: "When you delete the selected item, you cannot recover it!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            deleteItem(urldelet);
                        }
                    });
            });
            $('.EditBtn').click(function(e) {
                //تستخدم لمنع السلوك الافتراضي للحدث. عند استدعاء هذه الوظيفة،
                e.preventDefault();
                var id = $(this).closest("tr").find('.id').val();
                urledit = $(this).closest("tr").find('.url-edit').val();
                $.ajax({
                    url: urledit,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            openForm();
                            $('#card-title-pop-form').empty().append(response.data2.cardTitle);
                            if (response.data2.dataset == 1) {
                                onload = cloneRow;
                                console.log('datasets');
                                $('#pop-form-edit').removeAttr('hidden');
                                $('#mytable').attr('hidden', 'hidden');
                            }
                            downData(response);
                            var mthd = '<input type="hidden" name="_method" value="PUT">';
                            $('#myform').append(mthd);
                        } else {
                            swal(response.msg, {
                                icon: "error",
                                button: "حسناً",
                            });
                        }
                    },
                    error: function(response) {
                        console.log('error: function(response)');
                        console.log(response);
                        if (response.responseJSON.message) {
                            // swal('Error', response.responseJSON.message, 'error')
                            //     .then((result) => {
                            //         location.reload();
                            //     });
                            swal(response.responseJSON.message, {
                                icon: "error",
                                button: "حسناً",
                            });
                        }
                    }
                });
            });
            $('.AddBtn').click(function(e) {
                var url_store = $(this).closest("div").find('.url-store').val();
                $('#myform').attr('action', url_store);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
            $('.DetailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).closest("tr").find('.id').val();
                urldetail = $(this).closest("tr").find('.url-details').val();

                $.ajax({
                    url: urldetail,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.status == 1) {
                            $('#card-title').empty().append(response.data2.cardTitle);
                            downDataDetails(response);
                        } else {
                            // swal('Error', response.msg, 'error')
                            //     .then((result) => {
                            //         location.reload();
                            //     });
                            swal(response.msg, {
                                icon: "error",
                                button: "حسناً",
                            });
                        }
                    },
                    error: function(response) {
                        console.log('error: function(response)');
                        console.log(response);
                        if (response.responseJSON.message) {
                            // swal('Error', response.responseJSON.message, 'error')
                            //     .then((result) => {
                            //         location.reload();
                            //     });
                            swal(response.responseJSON.message, {
                                icon: "error",
                                button: "حسناً",
                            });
                        }
                    }
                });
            });
        });
    </script>
    @yield('script2')
@endsection

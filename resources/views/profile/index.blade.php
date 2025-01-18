@extends('layouts.app')
@section('title')
    {{ __('Profile') }}
@endsection



@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container">
        <!-- Content Header (Page header) -->
        <div class="">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>البروفايل</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="/profile/index/{{ Auth::user()->id }}">البروفايل الشخصي</a>
                            </li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title" style="float: right">بروفايلي</span>
                        <div class="card-tools float-left">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Profile Image -->
                                <div class="card card-widget widget-user">
                                    <div class="widget-user-header bg-info">
                                        <h3 class="widget-user-username">{{ $user->name }}</h3>
                                        <h5 class="widget-user-desc">
                                            {{ $user->type == 1 ? 'أدمن' : 'عميل' }}
                                        </h5>
                                    </div>
                                    <div class="widget-user-image text-center">
                                        <img class="img-circle elevation-2 "
                                            @if (Auth::user()->user_image)
                                                src="{{ asset('images/users/' . $user->image) }}"
                                            @else
                                                src="{{ asset('designImages/user.png') }}" @endif>
                                    </div>
                                    <div class="card-footer">
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>التعليقات</b> <a
                                                    class="float-left">{{ $user->comments->count() }}</a>
                                            </li>
                                            {{-- <li class="list-group-item">
                                                <b>المندوبيين</b> <a
                                                    class="float-left">{{ App\Models\Representative::all()->count() }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>العملاء</b> <a
                                                    class="float-left">{{ App\Models\Customer::where('statues', true)->get()->count() +App\Models\Doctor::where('statues', true)->get()->count() }}</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>الشركات</b> <a
                                                    class="float-left">{{ App\Models\Company::all()->count() }}</a>
                                            </li> --}}
                                        </ul>
                                        {{-- <a href="#" class="btn btn-primary btn-block"><b>{{ $user->user_name_third }}
                                                {{ $user->user_surname }}</b></a> --}}
                                    </div><!-- /.card-footer -->
                                </div><!-- /.card -->
                            </div>
                            <div class="col-md-6">
                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">About Me</h3>
                                    </div> <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> مكان وتأريخ الميلاد</strong>
                                        <p class="text-muted">
                                            kkkkkkkkkkkkkkkkk
                                        </p>

                                        <hr>
                                        <strong><i class="fas fa-male mr-1"></i> الجنس</strong>
                                        <p class="text-muted">kkkkkkkkkkkkkk</p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> البريد الالكتروني</strong>
                                        <p class="text-muted">{{ $user->email }}</p>

                                        <hr>
                                        <strong><i class="fas fa-pencil-alt mr-1"></i> رقم الهاتف</strong>
                                        <p class="text-muted">{{ $user->phone_no }}</p>
                                    </div><!-- /.card-body -->
                                </div><!-- /.card -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- /.content-wrapper -->
@endsection


@section('script')
    <script src="{{ asset('js/admin/posts.js') }}"></script>
@endsection

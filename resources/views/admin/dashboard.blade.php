@extends('layouts.index')
@section('title')
    {{ 'الصفحة الرئيسية' }}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ 'الصفحة الرئيسية' }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">{{ 'الصفحة الرئيسية' }}</a></li>
                            {{-- <li class="breadcrumb-item active">Dashboard v1</li> --}}
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $users }}</h3>
                                <p>{{ 'المستخدمين' }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">{{ 'المزيد من المعلومات' }} <i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $items }}</h3>
                                <p>{{ 'المنتجات' }}</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-text"></i>
                            </div>
                            <a href="{{ route('items.index') }}" class="small-box-footer">{{ 'المزيد من المعلومات' }} <i
                                    class="fas fa-arrow-circle-left"></i></a>
                        </div>
                    </div>
                    {{-- <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $comments }}</h3>
                                <p>{{ __('Comments') }}</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-comment"></i>
                            </div>
                            <a href="{{ route('comment.index') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $likes }}</h3>
                                <p>{{ __('Likes') }}</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-heart"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col --> --}}
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    {{-- <div> --}}
                    <img src="{{ asset('designImages/logo2.png') }}"
                        style="align-content: center;height: 100%;width: 100%">
                    {{-- </div> --}}
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

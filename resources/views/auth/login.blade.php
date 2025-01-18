@extends('layouts.app')

@section('content')
    <div class="hold-transition login-page bg-white">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center">{{ 'تسجيل الدخول' }} </div>
                <div class="card-body">
                    <p class="login-box-msg">{{ 'تسجيل الدخول الى الموقع' }}</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" placeholder="{{ 'البريد الالكتروني' }}" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" placeholder="password" placeholder="{{ 'كلمة السر' }}" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ 'دخول' }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ 'دخول' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- content-section-starts -->
    {{-- <div class="content">
        <div class="container">
            <div class="login-page">
                <div class="dreamcrub">
                    <ul class="breadcrumbs">
                        <li class="home">
                            <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                            <span>&gt;</span>
                        </li>
                        <li class="women">
                            Login
                        </li>
                    </ul>
                    <ul class="previous">
                        <li><a href="index.html">Back to Previous Page</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="account_grid">
                    <div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
                        <h2>NEW CUSTOMERS</h2>
                        <p>By creating an account with our store, you will be able to move through the checkout process
                            faster, store multiple shipping addresses, view and track your orders in your account and more.
                        </p>
                        <a class="acount-btn" href="register.html">Create an Account</a>
                    </div>
                    <div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
                        <h3>REGISTERED CUSTOMERS</h3>
                        <p>If you have an account with us, please log in.</p>
                        <form>
                            <div>
                                <span>Email Address<label>*</label></span>
                                <input type="text">
                            </div>
                            <div>
                                <span>Password<label>*</label></span>
                                <input type="password">
                            </div>
                            <a class="forgot" href="#">Forgot Your Password?</a>
                            <input type="submit" value="Login">
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

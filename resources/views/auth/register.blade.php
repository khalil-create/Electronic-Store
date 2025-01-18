@php use App\Arrays\Lists; @endphp
@extends('layouts.app')

@section('content')
    <div class="hold-transition login-page mt-3 bg-white">
        <div class="container text-right">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ 'انشاء حساب' }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="address">{{ 'الاسم' }}<span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" id="name">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="phone_no">{{ 'رقم الهاتف' }}<span class="text-danger">*</span></label>
                                    <input type="number" name="phone_no" value="{{ old('phone_no') }}" onkeyup="checkPhoneNumber()"
                                        class="form-control @error('phone_no') is-invalid @enderror" id="phonenumber">
                                    <small id="invalidPhoneNo" class="form-text text-danger" hidden></small>
                                    @if ($errors->has('phone_no'))
                                        <span class="help-block">
                                            <small class="form-text text-danger">{{ $errors->first('phone_no') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="username">{{ 'اسم المستخدم' }}<span class="text-danger">*</span></label>
                                    <input type="text" name="username" value="{{ old('username') }}"
                                        class="form-control @error('username') is-invalid @enderror" id="username">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                            <small class="form-text text-danger">{{ $errors->first('username') }}</small>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="image">{{ 'الصورة' }}</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" value="{{ old('image') }}" class="custom-file-input" name="image" id="image">
                                            <label class="custom-file-label" for="image"></label>
                                            @if ($errors->has('image'))
                                                <span class="help-block">
                                                    <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="khalil">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ 'معلومات الدخول' }} <span class="text-danger">*</span></h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="email">{{ 'البريد الالكتروني' }}</label>
                                                    <input type="email" name="email" value="{{ old('email') }}"
                                                        class="form-control @error('email') is-invalid @enderror" id="email">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">{{ 'كلمة السر' }}</label>
                                                    <input id="password" type="password" name="password"
                                                        class="form-control @error('password') is-invalid @enderror">
                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="control-label">{{ 'تأكيد كلمة السر' }}</label>
                                                    <input onkeyup="checkPassword()" id="password_confirmation" type="password"
                                                        name="password_confirmation"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror">
                                                    <small class="form-text text-danger" id="inalidPasswordConfirmation"
                                                        hidden>{{ __('Not Matched') }}</small>
                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <small class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><!-- /.card-body -->
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">
                                        {{ 'الاسم' }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">
                                        {{ 'البريد الالكتروني' }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_no" class="col-md-4 col-form-label text-md-right">
                                        {{ 'رقم الهاتف' }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="phone_no" type="number"
                                            class="form-control @error('phone_no') is-invalid @enderror" name="phone_no"
                                            value="{{ old('phone_no') }}" required autocomplete="phone_no">
                                        @error('phone_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">
                                        {{ 'الصورة' }}
                                    </label>
                                    <div class="col-md-6 input-group">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="form-control custom-file-input @error('image') is-invalid @enderror" name="image"
                                                value="{{ old('image') }}" autocomplete="image">
                                                <label class="custom-file-label" for="image"></label>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-md-4 col-form-label text-md-right">
                                        {{ 'اسم المستخدم' }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="username" type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username') }}" required autocomplete="username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Password') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="new-password" id="password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Confirm Password') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div> --}}
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ 'حفظ' }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

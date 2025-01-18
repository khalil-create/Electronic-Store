@php use App\Arrays\Lists; @endphp
@extends('layouts.app')
@section('title')
    {{ __('Add post') }}
@endsection

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3>{{ __('Edit profile') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form method="POST" action="{{ route('update.profile', Auth::user()->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf @method('PUT')
                                    <div class="card-body border">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="address">{{ __('Name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                                    class="form-control @error('name') is-invalid @enderror" id="name">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('name') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="image">{{ __('Image') }}</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" value="{{ old('image') }}"
                                                            class="custom-file-input" name="image" id="image">
                                                        <label class="custom-file-label" for="image"></label>
                                                        @if ($errors->has('image'))
                                                            <span class="help-block">
                                                                <small
                                                                    class="form-text text-danger">{{ $errors->first('image') }}</small>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="email">{{ __('Email') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="email" name="email"
                                                    value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror"
                                                    id="email">
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('email') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">{{ __('Password') }}</label>
                                                <input id="password" type="password" name="password" class="form-control">
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('password') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label">{{ __('Password Confirmation') }}</label>
                                                <input onkeyup="checkPassword()" id="password_confirmation" type="password"
                                                    name="password_confirmation" class="form-control">
                                                <small class="form-text text-danger" id="inalidPasswordConfirmation"
                                                    hidden>{{ __('Not Matched') }}</small>
                                                @if ($errors->has('password_confirmation'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('password_confirmation') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary font" style="margin: 10px">
                                                {{ __('Save') }} <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- /.form-group -->
                                </form>
                            </div><!-- /.form-group -->
                        </div><!-- /.col -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

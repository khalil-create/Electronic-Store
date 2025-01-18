@extends('layouts.app')
@section('title')
    {{ __('Edit post') }}
@endsection

@section('content')
    <div class="container">
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3>{{ __('Edit post') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <form method="POST" action="{{ route('update.post', $post->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf @method('PUT')
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="title">{{ __('Title') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" name="title"
                                                    value="{{ old('title', $post->title) }}" class="form-control @error('title') is-invalid @enderror"
                                                    id="title">
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('title') }}</small>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('Content') }}<span class="text-danger">*</span></label>
                                                <textarea name="content" id="content" cols="30" rows="6" placeholder="content..." class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content) }}</textarea>
                                                @if ($errors->has('content'))
                                                    <span class="help-block">
                                                        <small
                                                            class="form-text text-danger">{{ $errors->first('content') }}</small>
                                                    </span>
                                                @endif
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
                        </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection

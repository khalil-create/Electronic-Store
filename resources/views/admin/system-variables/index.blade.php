@extends('layouts.base')
@section('sys-variables')
    <form id="myform" name="myform" method="POST" action="{{ url($urls['update-form']) }}"
        enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="card-body">
            <div class="form-group col-md-4">
                <label for="site_name">{{ 'اسم الموقع' }}<span class="text-danger">*</span></label>
                <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $data->site_name) }}"
                    class="form-control @error('site_name') is-invalid @enderror">
                @if ($errors->has('site_name'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('site_name') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="site_phone">{{ 'رقم هاتف الموقع' }}<span class="text-danger">*</span></label>
                <input type="text" name="site_phone" id="site_phone" value="{{ old('site_phone', $data->site_phone) }}"
                    class="form-control @error('site_phone') is-invalid @enderror">
                @if ($errors->has('site_phone'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('site_phone') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="currency">{{ 'العملة' }}<span class="text-danger ">*{{ $has_items?' (لايمكنك التعديل)':'' }}</span></label>
                {{-- <select name="currency" class="form-control custom-select rounded-0 @error('currency') is-invalid @enderror" id="currency" {{ $has_items ? 'disabled' : '' }}> --}}
                <select name="currency" class="form-control custom-select rounded-0 @error('currency') is-invalid @enderror" id="currency"
                    onchange="{{ $has_items ? 'this.selectedIndex = this.defaultIndex;' : '' }}" @readonly($has_items)>
                    @foreach (App\Arrays\Lists::CURRENCIES as $key => $value)
                        <option value="{{ $key }}"
                            {{ old('currency', $data->currency) == $key ? 'selected' : '' }}>
                            {{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('currency'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('currency') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="facebook_url">{{ 'رابط الموقع على الفيسبوك' }}<span class="text-danger">*</span></label>
                <input type="text" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $data->facebook_url) }}"
                    class="form-control @error('facebook_url') is-invalid @enderror">
                @if ($errors->has('facebook_url'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('facebook_url') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="tweeter_url">{{ 'رابط الموقع على تويتر' }}<span class="text-danger">*</span></label>
                <input type="text" name="tweeter_url" id="tweeter_url" value="{{ old('tweeter_url', $data->tweeter_url) }}"
                    class="form-control @error('tweeter_url') is-invalid @enderror">
                @if ($errors->has('tweeter_url'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('tweeter_url') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="address">{{ 'العنوان' }}<span class="text-danger">*</span></label>
                <input type="text" name="address" id="address" value="{{ old('address', $data->address) }}"
                    class="form-control @error('address') is-invalid @enderror">
                @if ($errors->has('address'))
                    <span class="help-block">
                        <small class="form-text text-danger">{{ $errors->first('address') }}</small>
                    </span>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="image_logo">{{ 'شعار الموقع' }}</label>
                <div class="input-group">
                    <div class="custom-file col-md-8">
                        <input type="file" value="{{ old('image_logo') }}" class="custom-file-input @error('image_logo') is-invalid @enderror" name="image_logo" id="image_logo">
                        <label class="custom-file-label" for="image_logo"></label>
                        @if ($errors->has('image_logo'))
                            <span class="help-block">
                                <small class="form-text text-danger">{{ $errors->first('image_logo') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="navbar-brand col-md-4">
                        <a href="#" class="brand-link" style="display: inline">
                            <img src="{{ asset('designImages/') }}/{{ $data->image_logo ? $data->image_logo : 'logo.png' }}" class="brand-image img-circle elevation-3" style="opacity: .8">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <button id="save" type="submit" class="btn btn-primary font">
                حفظ<i class="fas fa-save"></i>
            </button>
        </div>
    </form>
@endsection
@section('links-pagination')
    {{-- {!! $systemVariables->links() !!} --}}
@endsection

@section('script2')
    <script src="{{ asset('js2/admin/system-variables.js') }}"></script>
@endsection

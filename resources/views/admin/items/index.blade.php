@php use App\Arrays\Lists; @endphp
@extends('layouts.base')
@section('tbody')
    @php
        $sys_variables = App\Models\SystemVariable::first();

        $currency = $sys_variables->currency;
        $cur_code = '$';
        if($currency == 2)
            $cur_code = 'ر.ي';
        elseif($currency == 3)
            $cur_code = 'ر.س';

        $i = 1;
    @endphp
    @foreach ($items as $row)
        <tr class="odd">
            <td class="dtr-control" tabindex="0">{{ $i++ }}</td>
            {{-- <td>{{ $row->title }}</td> --}}
            <td><a href="{{ route('show.item', $row->id) }}" title="{{ 'عرض المنتج' }}">{{ $row->name }}</a></td>
            {{-- <td>{{ $row->user->name }}</td> --}}
            <td>{{ $row->description }}</td>
            <td>{{ $cur_code . $row->price }}</td>
            <td>{{ $row->category->name }}</td>
            <td>
                <a href="#" title="{{ __('edit') }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="{{ $urls['edit'] }}{{ $row->id }}">
                <input type="hidden" class="id" value="{{ $row->id }}">
                <a href="#" title="{{ __('delete') }}" class="btn btn-outline-danger btn-sm"><i
                        class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="{{ $urls['delete'] }}{{ $row->id }}">
            </td>
        </tr>
    @endforeach
@endsection
@section('links-pagination')
    {!! $items->links() !!}
@endsection
@section('pop-form')
    <div class="form-group col-md-4">
        <label for="name">{{ 'اسم المنتج' }}<span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('email') is-invalid @enderror" id="name">
        @if ($errors->has('name'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label class="control-label">{{ 'الفئة' }}<span class="text-danger">*</span></label>
        <select name="category_id" value="{{ old('category_id') }}" class="form-control select2 @error('category_id') is-invalid @enderror" id="category_id">
            @foreach ($categories as $row)
                <option value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('category_id'))
            <span class="help-block">
                <small class="text-sm text-danger">{{ $errors->first('category_id') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="price">{{ 'السعر' }}<span class="text-danger">* {{ '(' . Lists::CURRENCIES[$currency] . ')' }}</span></label>
        <input type="text" name="price" value="{{ old('price') }}" class="form-control @error('email') is-invalid @enderror" id="price">
        @if ($errors->has('price'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('price') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title">{{ 'صور المنتج' }} <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="image1">{{ 'الصورة 1' }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ old('image1') }}" class="custom-file-input @error('image1') is-invalid @enderror" name="image1" id="image1">
                                <label class="custom-file-label" for="image1"></label>
                                @if ($errors->has('image1'))
                                    <span class="help-block">
                                        <small class="form-text text-danger">{{ $errors->first('image1') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image2">{{ 'الصورة 2' }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ old('image2') }}" class="custom-file-input @error('image2') is-invalid @enderror" name="image2" id="image2">
                                <label class="custom-file-label" for="image2"></label>
                                @if ($errors->has('image2'))
                                    <span class="help-block">
                                        <small class="form-text text-danger">{{ $errors->first('image2') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="image3">{{ 'الصورة 3' }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" value="{{ old('image3') }}" class="custom-file-input @error('image3') is-invalid @enderror" name="image3" id="image3">
                                <label class="custom-file-label" for="image3"></label>
                                @if ($errors->has('image3'))
                                    <span class="help-block">
                                        <small class="form-text text-danger">{{ $errors->first('image3') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
    </div>
    <div class="form-group col-md-4">
        <label for="model_no">{{ 'رقم المودل' }}<span class="text-danger">*</span></label>
        <input type="text" name="model_no" value="{{ old('model_no') }}" class="form-control @error('email') is-invalid @enderror" id="model_no">
        @if ($errors->has('model_no'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('model_no') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-8">
        <label>{{ 'الوصف' }}<span class="text-danger">*</span></label>
        <textarea name="description" id="description" cols="30" rows="6" placeholder="الوصف..." class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('description') }}</small>
            </span>
        @endif
    </div>
@endsection

@section('script2')
    <script src="{{ asset('js2/admin/items.js') }}"></script>
@endsection

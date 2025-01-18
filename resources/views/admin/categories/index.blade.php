@php use App\Arrays\Lists; @endphp
@extends('layouts.base')
@section('tbody')
    <?php $i = 1; ?>
    @foreach ($categories as $row)
        <tr class="odd">
            <td class="dtr-control" tabindex="0">{{ $i++ }}</td>
            {{-- <td><a href="{{ route('show.category', $row->id) }}" title="{{ 'عرض الفئة' }}">{{ $row->name }}</a></td> --}}
            <td>{{ $row->name }}</td>
            <td>{{ $row->description }}</td>
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
    {!! $categories->links() !!}
@endsection
@section('pop-form')
    <div class="form-group col-md-12">
        <label for="name">{{ 'اسم الفئة' }}<span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}"
            class="form-control @error('email') is-invalid @enderror" id="name">
        @if ($errors->has('name'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label>{{ 'الوصف' }}<span class="text-danger">*</span></label>
        <textarea name="description" id="description" cols="30" rows="6" placeholder="الوصف..."
            class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @if ($errors->has('description'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('description') }}</small>
            </span>
        @endif
    </div>
@endsection

@section('script2')
    <script src="{{ asset('js2/admin/categories.js') }}"></script>
@endsection

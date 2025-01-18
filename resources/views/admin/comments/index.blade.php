@php use App\Arrays\Lists; @endphp
@extends('layouts.base')
@section('tbody')
    <?php $i = 1; ?>
    @foreach ($comments as $row)
        <tr class="odd">
            <td class="dtr-control" tabindex="0">{{ $i++ }}</td>
            <td class="item-description">{{ $row->content }}</td>
            <td><a href="{{ route('show.post', $row->post_id) }}" title="{{ __('Post content') }}">{{ $row->post->title }}</a>
            </td>
            <td><a href="{{ route('profile.index', $row->user_id) }}" title="{{ __('Profile') }}">{{ $row->user->name }}</a>
            </td>
            <td>{{ $row->posted_at }}</td>
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
    {!! $comments->links() !!}
@endsection
@section('pop-form')
    <div class="form-group col-md-12">
        <label class="control-label">{{ __('Author') }}<span class="text-danger">*</span></label>
        <select name="author" value="{{ old('author') }}" class="form-control select2" id="author">
            @foreach ($users as $row)
                <option value="{{ $row->id }}" {{ old('author') == $row->id ? 'selected' : '' }}>{{ $row->name }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('author'))
            <span class="help-block">
                <small class="text-sm text-danger">{{ $errors->first('author') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label>{{ __('Content') }}<span class="text-danger">*</span></label>
        <textarea name="content" id="content" cols="30" rows="6"
            class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
        @if ($errors->has('content'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('content') }}</small>
            </span>
        @endif
    </div>
@endsection

@section('script2')
    <script src="{{ asset('js/admin/comments.js') }}"></script>
@endsection

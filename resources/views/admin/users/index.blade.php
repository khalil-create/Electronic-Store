@php use App\Arrays\Lists; @endphp
@extends('layouts.base')
@section('tbody')
    <?php $i = 1; ?>
    @foreach ($users as $row)
        <tr class="odd">
            <td class="dtr-control" tabindex="0">{{ $i++ }}</td>
            <td>
                @foreach (Lists::USER_TYPES as $k => $v)
                    @if ($row->type == $k)
                        {{ $v }}
                    @endif
                @endforeach
            </td>
            <td>{{ $row->name }}</td>
            {{-- <td><a href="{{ route('profile.index', $row->id) }}" title="{{ 'البروفايل' }}">{{ $row->name }}</a></td> --}}
            <td>{{ $row->email }}</td>
            <td>
                {{ $row->phone_no }}
                {{-- <a href="{{ route('user.followers', $row->id) }}" title="{{ __('followers') }}">{{ 'ddddddddd' }}</a> --}}
            </td>
            <td>
                @foreach (Lists::USER_STATUS as $key => $value)
                    @if ($row->status == $key)
                        {{-- {{ $v }} --}}
                        @if ($row->type != '1')
                            <a href="#" title="{{ $key == 1 ? 'إلغاء التفعيل' : 'تفعيل' }}">
                                <b class="text-{{ $key == 1 ? 'success' : 'danger' }} activateBtn">{{ $value }}</b>
                            </a>
                            <input type="hidden" class="url-activate" value="{{ $urls['activate'] }}{{ $row->id }}">
                        @else
                            <span title="لا يمكنك إلغاء التفعيل للأدمن">
                                <b class="text-{{ $key == 1 ? 'success' : 'danger' }} activateBtn">{{ $value }}</b>
                            </span>
                        @endif
                    @endif
                @endforeach
            </td>
            <td class="event-buttons">
                <a href="#" title="{{ __('edit') }}" class="btn btn-primary btn-sm"><i
                        class="fas fa-edit EditBtn"></i></a>
                <input type="hidden" class="url-edit" value="{{ $urls['edit'] }}{{ $row->id }}">
                <input type="hidden" class="id" value="{{ $row->id }}">
                <a href="#" title="{{ __('delete') }}" class="btn btn-outline-danger btn-sm"><i
                        class="fas fa-trash DeleteBtn"></i></a>
                <input type="hidden" class="url-delet" value="{{ $urls['delete'] }}{{ $row->id }}">

                <a href="tel:+967{{ $row->phone_no }}">
                    <i class="nav-icon fas fa-phone" title="اتصال"></i>
                </a>

                <a href="https://wa.me//+967 {{ $row->phone_no }}?text=مرحبا {{ $row->name }}، كيف يمكنني مساعدتك"
                    target="_blank" title="واتساب">
                    <svg width="20" height="20" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg"
                        fill-rule="evenodd" clip-rule="evenodd" class="karzoun-box-content-send-btn-icon">
                        <path
                            d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z">
                        </path>
                    </svg>
                    {{-- <span class="karzoun-box-content-send-btn-text">{{ ' تواصل معنا: 775006398' }}</span> --}}
                </a>
            </td>
        </tr>
    @endforeach
@endsection
@section('links-pagination')
    {!! $users->links() !!}
@endsection
@section('pop-form')
    <div class="form-group col-md-3">
        <label for="address">{{ 'الاسم' }}<span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}"
            class="form-control @error('name') is-invalid @enderror" id="name">
        @if ($errors->has('name'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('name') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="phone_no">{{ 'رقم الهاتف' }}<span class="text-danger">*</span></label>
        <input type="number" name="phone_no" value="{{ old('phone_no') }}"
            class="form-control @error('phone_no') is-invalid @enderror" id="phone_no">
        @if ($errors->has('phone_no'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('phone_no') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="username">{{ 'اسم المستخدم' }}<span class="text-danger">*</span></label>
        <input type="text" name="username" value="{{ old('username') }}"
            class="form-control @error('username') is-invalid @enderror" id="username">
        @if ($errors->has('username'))
            <span class="help-block">
                <small class="form-text text-danger">{{ $errors->first('username') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-3">
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
    <div class="form-group col-md-3">
        <label class="control-label">{{ 'الحالة' }}<span class="text-danger">*</span></label>
        <select name="status" class="form-control custom-select rounded-0" id="status">
            @foreach (Lists::USER_STATUS as $k => $v)
                <option value="{{ $k }}" {{ old('status') == $k ? 'selected' : '' }}>{{ $v }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('status'))
            <span class="help-block">
                <small class="text-sm text-danger">{{ $errors->first('status') }}</small>
            </span>
        @endif
    </div>
    <div class="form-group col-md-12">
        <div class="khalil">
            <div class="card-header">
                <h3 class="card-title">{{ 'معلومات الدخول' }} <span class="text-danger">*</span></h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="control-label">{{ 'نوع المستخدم' }}</label>
                        <select name="type" class="form-control custom-select rounded-0 @error('type') is-invalid @enderror" id="type">
                            @foreach (Lists::USER_TYPES as $k => $v)
                                <option value="{{ $k }}" {{ old('type', 2) == $k ? 'selected' : '' }}>
                                    {{ $v }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('type'))
                            <span class="help-block">
                                <small class="text-sm text-danger">{{ $errors->first('type') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label for="email">{{ 'البريد الالكتروني' }}</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror" id="email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                        <label class="control-label">{{ 'كلمة السر' }}</label>
                        <input id="password" type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
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
@endsection

@section('script2')
    <script src="{{ asset('js2/admin/users.js') }}"></script>
@endsection

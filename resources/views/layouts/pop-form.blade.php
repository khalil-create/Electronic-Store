<div class="formPopup card card-default" id="popupForm">
    <div class="card-header">
        <h3 id="card-title-pop-form" class="card-title">{{ $head_data['card-title-pop-form'] }}
            @yield('card-title')
        </h3>
        {{-- <span class=" col-md-4">
            {{ 'الحقول المطلوبة: ' }}
            <span class="text-danger">*</span>
        </span> --}}
        <div class="card-tools float-left">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" onclick="clearAllInputs()" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
            </button>

        </div>
    </div><!-- /.card-header -->
    <div class="card-body">
        {{-- <div class="row"> --}}
            <div class="col-md-12">
                <div>
                    <span class="text-danger">*</span>
                    {{ ': الحقول المطلوبة' }}
                </div>
                <div class="form-group ScrollStyle">
                    {{-- <div class="ScrollStyle"> --}}
                    <form id="myform" name="myform" method="POST" action="{{ url($urls['store-form']) }}"
                        enctype="multipart/form-data" @yield('form-attr')>
                        {{ csrf_field() }}
                        <div class="card-body border">
                            <div class="row">
                                @yield('pop-form')
                            </div>
                            <div class="form-group col-md-12">
                                <button id="save" type="submit" class="btn btn-primary font">
                                    <i class="fas fa-save"></i> {{ 'حفظ' }}
                                </button>
                            </div>
                        </div><!-- /.card-body -->
                    </form><!-- /.form -->
                    {{-- </div><!-- /. ScrollStyle --> --}}
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        {{-- </div><!-- /.row --> --}}
    </div><!-- /.card-body -->
</div><!-- /.formPopup -->

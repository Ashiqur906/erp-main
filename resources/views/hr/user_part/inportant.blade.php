<div class="card mb-0">
    {{ Form::open(['method' => 'POST', 'route'=>'admin.hr.user.update']) }}
    {{ Form::hidden('part', 'important' ) }}
    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('email', 'Email')}}
                    {{ Form::email('email', (!empty($fdata->email) ? $fdata->email : NULL), ['class' => ($errors->has('email')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Email' ]) }}
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('designation', 'Designation')}}
                    {{ Form::select('designation',lv_get_option_arr('Designation'), (!empty($fdata->designation) ? $fdata->designation : NULL), ['class' => ($errors->has('designation')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}

                    @error('designation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    {{ Form::label('role', 'Role')}}
                    {{ Form::select('role',get_rolse_arr(), (!empty(getURole($fdata->id)) ? getURole($fdata->id)->id : NULL), ['class' => ($errors->has('role')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                    @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'New Password')}}
                    {{ Form::password('password', ['class' => ($errors->has('password')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'password' ]) }}
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>







            </div>

        </div>
    </div>

    <div class="card-footer">
        <a href="{{route('admin.hr.users')}}" class="btn btn-sm btn-danger">
            <span class="material-icons">arrow_back</span> Back
        </a>
        <button type="submit" class="btn btn-success float-right">{{ __('Submit') }}</button>
    </div>
    {{ Form::close() }}
</div>

@push('scripts')
<script>

</script>
@endpush

@section('headcss')
<!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css"> -->
@endsection
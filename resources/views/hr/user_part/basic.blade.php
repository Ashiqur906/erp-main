<div class="card mb-0">
    {{ Form::open(['method' => 'POST', 'route'=>'admin.hr.user.update']) }}
    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
    {{ Form::hidden('part', 'basic' ) }}
    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name', 'Name')}}
                    {{ Form::text('name', (!empty($fdata->name) ? $fdata->name : NULL), ['class' => ($errors->has('name')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Name' ]) }}
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="form-group">
                    {{ Form::label('mobile', 'Mobile')}}
                    {{ Form:: text('mobile', (!empty($fdata->mobile) ? $fdata->mobile : NULL), ['class' => ($errors->has('mobile')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'mobile' ]) }}
                    @error(' mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    {{ Form::label('emargancy_mobile', 'Emargancy Mobile')}}
                    {{ Form::text('emargancy_mobile', (!empty($fdata->emargancy_mobile) ? $fdata->emargancy_mobile : NULL), ['class' => ($errors->has('emargancy_mobile')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Emargancy Mobile' ]) }}
                    @error('emargancy_mobile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('religion', 'Religion')}}
                    {{ Form::select('religion',lv_get_option_arr('Religion'), (!empty($fdata->religion) ? $fdata->religion : NULL), ['class' => ($errors->has('religion')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                    @error('religion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('nationality', 'Nationality')}}
                    {{ Form::text('nationality', (!empty($fdata->nationality)? $fdata->nationality: NULL), ['class' => ($errors->has('nationality')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Nationality' ]) }}
                    @error('nationality')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('remarks', 'Remarks')}}
                    {{ Form::text('remarks', (!empty($fdata->remarks)? $fdata->remarks: NULL), ['class' => ($errors->has('remarks')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Remarks' ]) }}
                    @error('remarks')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>


            </div>
            <div class="col-md-6">

                <div class="form-group">
                    {{ Form::label('gender', 'Gender')}}
                    {{ Form::select('gender',lv_get_option_arr('Gender'), (!empty($fdata->gender) ? $fdata->gender : NULL), ['class' => ($errors->has('gender')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('marital_status', 'Marital status')}}
                    {{ Form::select('marital_status',lv_get_option_arr('Marital status'), (!empty($fdata->marital_status) ? $fdata->marital_status : NULL), ['class' => ($errors->has('marital_status')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                    @error('marital_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('father_name', "Father's Name")}}
                    {{ Form::text('father_name', (!empty($fdata->father_name)? $fdata->father_name: NULL), ['class' => ($errors->has('father_name')? 'form-control is-invalid': 'form-control'), 'placeholder' => "Father's Name"]) }}
                    @error('father_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('husband_name', "Husband's Name")}}
                    {{ Form::text('husband_name', (!empty($fdata->husband_name)? $fdata->husband_name: NULL), ['class' => ($errors->has('husband_name')? 'form-control is-invalid': 'form-control'), 'placeholder' => "Husband's Name"]) }}
                    @error('husband_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{ Form::label('mother_name', "Mother's name")}}
                    {{ Form::text('mother_name', (!empty($fdata->mother_name)? $fdata->mother_name: NULL), ['class' => ($errors->has('mother_name')? 'form-control is-invalid': 'form-control'), 'placeholder' => "Mother's name" ]) }}
                    @error('mother_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('height', 'Height')}}
                    {{ Form::text('height', (!empty($fdata->height)? $fdata->height: NULL), ['class' => ($errors->has('height')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Height' ]) }}
                    @error('height')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{ Form::label('weight', 'Weight')}}
                    {{ Form::text('weight', (!empty($fdata->weight)? $fdata->weight: NULL), ['class' => ($errors->has('weight')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Weight' ]) }}
                    @error('weight')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('photo', 'Photo')}}
            {{ Form::text('photo', (!empty($fdata->photo)? $fdata->photo: NULL), ['class' => ($errors->has('photo')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Photo' ]) }}
            @error('photo')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>



        <div class="form-group">
            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                {{ Form::checkbox('is_active', 'Yes', false, [
        'class' => 'custom-control-input', 
        'id' => 'is_active', 
        'checked' => ((!empty($fdata->is_active) && $fdata->is_active == 'Yes')? true: false)
        ])}}
                <label class="custom-control-label" for="is_active"> Is Active ?</label>
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
@extends('layouts.master')

@section('title', 'Document')
@section('sub_title', ' ')
@section('content')
<section class="content">


    <div class="row">

        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- @dump($fdata) -->
                <!-- /.card-header -->
                <!-- form start -->
                {{ Form::open(['method' => 'POST', 'route'=>'document.store']) }}
                {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
                {{ Form::hidden('user_id', (!empty($fdata->user_id) ? $fdata->user_id : $user->id) ) }}
                <div class="card-body">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" value="{{$user->name}}" disabled="">
                    </div>
                    <div class="form-group">
                        {{ Form::label('type', 'Document Type')}}
                        {{ Form::select('type',lv_document(), (!empty($fdata->type) ? $fdata->type : NULL), ['class' => ($errors->has('type')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {{ Form::label('title', 'Title')}}
                        {{ Form::text('title', (!empty($fdata->title) ? $fdata->title : NULL), ['class' => ($errors->has('title')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Title' ]) }}
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description')}}
                        {{ Form::textarea('description', (!empty($fdata->description) ? $fdata->description : NULL), ['rows' => 3, 'placeholder' => 'Description..', 'class' => ($errors->has('description')? 'form-control is-invalid': 'form-control') ]) }}
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        {{ Form::label('file_one', 'File One Link')}}
                        {{ Form::text('file_one', (!empty($fdata->file_one)? $fdata->file_one: NULL), ['class' => ($errors->has('file_one')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'File one Link..' ]) }}
                        @error('file_one')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{ Form::label('file_two', 'File Two Link')}}
                        {{ Form::text('file_two', (!empty($fdata->file_two)? $fdata->file_two: NULL), ['class' => ($errors->has('file_two')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'File two Link..' ]) }}
                        @error('file_two')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{ Form::label('file_three', 'File Three Link')}}
                        {{ Form::text('file_three', (!empty($fdata->file_three)? $fdata->file_three: NULL), ['class' => ($errors->has('file_three')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'File three Link..' ]) }}
                        @error('file_three')
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
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>





    </div>
    <!-- /.row -->


</section>
@endsection


@section('cusjs')
<style>

</style>


<script>

</script>


@endsection
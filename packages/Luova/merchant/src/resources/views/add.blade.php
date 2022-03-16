@extends('layouts.master')
@section('title', 'New Page')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{ Form::open(['method' => 'POST', 'route'=>'merchant.store']) }}
        <div class="row">
            <div class="col-md-9">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Page Information</h3>
                    </div>
                    <!-- @dump($fdata) -->
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
                    {{ Form::hidden('seo_id', (!empty($fdata->seo_id) ? $fdata->seo_id : NULL) ) }}
                    <div class="card-body">


                        <div class="form-group">
                            {{ Form::label('title', 'Title')}}
                            {{ Form::text('title', (!empty($fdata->title) ? $fdata->title : NULL), ['id' => 'title','class' => ($errors->has('title')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Title' ]) }}
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            {{ Form::label('sub_title', 'Sub Title')}}
                            {{ Form::text('sub_title', (!empty($fdata->sub_title) ? $fdata->sub_title : NULL), ['class' => ($errors->has('sub_title')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Sub title' ]) }}
                            @error('sub_title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            {{ Form::label('slug', 'Slug')}}
                            {{ Form::text('slug', (!empty($fdata->slug) ? $fdata->slug : NULL), ['id' => 'slug','class' => ($errors->has('slug')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Slug' ]) }}
                            @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description')}}
                            {{ Form::textarea('description', (!empty($fdata->description) ? $fdata->description : NULL), ['rows' => 3, 'placeholder' => 'Description..', 'class' => 'htmltexteditor form-control '.($errors->has('description')? ' is-invalid': '') ]) }}
                            @error('description')
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

                </div>
            </div>

            <div class="col-md-3">

            </div>

        </div>
        {{ Form::close() }}
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>



<!-- ./wrapper -->
@endsection

<script>

</script>

@push('scripts')



<script>
    $(document).ready(function() {  

    });
</script>


@endpush
@extends('layouts.master')
@section('title', 'New Account')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{ Form::open(['method' => 'POST', 'route'=>'account.store']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Account Info</h3>
                    </div>
                    <!-- @dump($fdata) -->
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
       
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
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
                                    {{ Form::label('ac_head', 'User')}}
                                    {{ Form::select('ac_head', AccountHeadSelect(),(!empty($fdata->ac_head) ? $fdata->ac_head : NULL), ['id' => 'ac_head','class' => (($errors->has('ac_head')? 'is-invalid': ''). ' form-control select2'), 'placeholder' => 'Select' ]) }}
                                    @error('ac_head')
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
                                    {{ Form::label('code', 'Code')}}
                                    {{ Form::text('code', (!empty($fdata->code) ? $fdata->code : NULL), ['class' => ($errors->has('code')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Code' ]) }}
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
        
                                </div>

                                <div class="form-group">
                                    {{ Form::label('user_id', 'User')}}
                                    {{ Form::select('user_id', userSelect(),(!empty($fdata->user_id) ? $fdata->user_id : NULL), ['id' => 'user_id','class' => (($errors->has('user_id')? 'is-invalid': ''). ' form-control select2'), 'placeholder' => 'Select' ]) }}
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
        
                                </div>

                                            
                                <div class="form-group">
                                    {{ Form::label('user_id', 'Status')}}
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
                        </div>

                   
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>

                </div>
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





@endpush
@extends('layouts.master')
@section('title', 'New Page')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{-- @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif --}}
        <!-- Small boxes (Stat box) -->
        {{ Form::open(['method' => 'POST', 'route'=>'product.store']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Product Information</h3>
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
                                    {{ Form::label('purchase_price', 'Purchase Price')}}
                                    {{ Form::number('purchase_price', (!empty($fdata->purchase_price) ? $fdata->purchase_price : NULL), [ 'step'=>'any', 'class' => ($errors->has('purchase_price')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00' ]) }}
                                    @error('purchase_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('sales_price', 'Price (MRP)')}}
                                    {{ Form::number('sales_price', (!empty($fdata->sales_price) ? $fdata->sales_price : NULL), ['step'=>'any', 'class' => ($errors->has('sales_price')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00' ]) }}
                                    @error('sales_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('dp_price', 'Price (DP)')}}
                                    {{ Form::number('dp_price', (!empty($fdata->dp_price) ? $fdata->dp_price : NULL), ['step'=>'any', 'class' => ($errors->has('dp_price')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00' ]) }}
                                    @error('dp_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                                <div class="form-group">
                                    {{ Form::label('tp_price', 'Price (TP)')}}
                                    {{ Form::number('tp_price', (!empty($fdata->tp_price) ? $fdata->tp_price : NULL), ['step'=>'any', 'class' => ($errors->has('tp_price')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00' ]) }}
                                    @error('tp_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>



                                <div class="form-group">
                                    {{ Form::label('avg_purchase', 'Average Purchase Price')}}
                                    {{ Form::number(null, (!empty($fdata->avg_purchase) ? $fdata->avg_purchase : NULL), ['step'=>'any', 'class' => ($errors->has('avg_purchase')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00','readonly'  ]) }}
                                    @error('avg_purchase')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('avg_sale', 'Average Sales Price')}}
                                    {{ Form::number(null, (!empty($fdata->avg_sale) ? $fdata->avg_sale : NULL), ['step'=>'any', 'class' => ($errors->has('avg_sale')? 'form-control is-invalid': 'form-control'), 'placeholder' => '0.00', 'readonly' ]) }}
                                    @error('avg_sale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('code', 'Product Code')}}
                                    {{ Form::text('code', (!empty($fdata->code) ? $fdata->code : NULL), ['class' => ($errors->has('code')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Sub title' ]) }}
                                    @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('category_id', 'Category')}}
                                    {{ Form::select('category_id',lv_categoriesArray(), (!empty($fdata->category_id) ? $fdata->category_id : NULL), ['class' => ($errors->has('category_id')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('unit_id', 'Unite')}}
                                    {{ Form::select('unit_id',lv_unitsArray(), (!empty($fdata->unit_id) ? $fdata->unit_id : NULL), ['class' => ($errors->has('unit_id')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                                    @error('unit_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    {{ Form::label('description', 'Description')}}
                                    {{ Form::textarea('description', (!empty($fdata->description) ? $fdata->description : NULL), ['rows' => 4, 'placeholder' => 'Description..', 'class' => 'form-control '.($errors->has('description')? ' is-invalid': '') ]) }}
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
                                    {{ Form::label('is_active', 'Status')}}
                                    <div
                                        class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
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



<script>
    $(document).ready(function() {  

    });
</script>


@endpush
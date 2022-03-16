<div class="card-body">
    <div class="row">
        @foreach($address as $addr)
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-text-width"></i>
                        {{$addr->type}}
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Division</dt>
                        <dd class="col-sm-8"> {{$addr->division}}</dd>
                        <dt class="col-sm-4">District</dt>
                        <dd class="col-sm-8"> {{$addr->district}}</dd>
                        <dt class="col-sm-4">Thana</dt>
                        <dd class="col-sm-8"> {{$addr->thana}}</dd>
                        <dt class="col-sm-4">union</dt>
                        <dd class="col-sm-8"> {{$addr->union}}</dd>
                        <dt class="col-sm-4">postoffice</dt>
                        <dd class="col-sm-8"> {{$addr->postoffice}}</dd>

                        <dt class="col-sm-4">village</dt>
                        <dd class="col-sm-8"> {{$addr->village}}</dd>
                        <dt class="col-sm-4">para</dt>
                        <dd class="col-sm-8"> {{$addr->para}}</dd>
                        <dt class="col-sm-4">ward</dt>
                        <dd class="col-sm-8"> {{$addr->ward}}</dd>
                        <dt class="col-sm-4">union</dt>
                        <dd class="col-sm-8"> {{$addr->union}}</dd>
                        <dt class="col-sm-4">house_no</dt>
                        <dd class="col-sm-8"> {{$addr->house_no}}</dd>
                        <dt class="col-sm-4">aprtment_no</dt>
                        <dd class="col-sm-8"> {{$addr->aprtment_no}}</dd>

                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

        @endforeach
    </div>
    <div class="row">
        <div class="col-md-12">


            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lg">
                Add New Address
            </button>


            <div class="modal fade" id="modal-lg">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add new address</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{ Form::open(['method' => 'POST', 'route'=>'address.store']) }}
                        {{ Form::hidden('user_id', (!empty($fuser) ? $fuser : NULL) ) }}
                        <div class="modal-body">
                            <div class="form-group">
                                {{ Form::label('type', 'Type')}}
                                {{ Form::select('type',lv_get_option_arr('Address'), (!empty($faddr->type) ? $faddr->type : NULL), ['class' => ($errors->has('type')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('division', 'Division')}}
                                        {{ Form::text('division', (!empty($faddr->division) ? $faddr->division : NULL), ['class' => ($errors->has('division')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'division' ]) }}
                                        @error('division')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('district', 'District')}}
                                        {{ Form::text('district', (!empty($faddr->district) ? $faddr->district : NULL), ['class' => ($errors->has('district')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'district' ]) }}
                                        @error('district')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('thana', 'Thana')}}
                                        {{ Form::text('thana', (!empty($faddr->thana) ? $faddr->thana : NULL), ['class' => ($errors->has('thana')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'thana' ]) }}
                                        @error('thana')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('union', 'Union')}}
                                        {{ Form::text('union', (!empty($faddr->union) ? $faddr->union : NULL), ['class' => ($errors->has('union')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'union' ]) }}
                                        @error('union')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {{ Form::label('postoffice', 'Post office')}}
                                        {{ Form::text('postoffice', (!empty($faddr->postoffice) ? $faddr->postoffice : NULL), ['class' => ($errors->has('postoffice')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'postoffice' ]) }}
                                        @error('postoffice')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('para', 'Para')}}
                                        {{ Form::text('para', (!empty($faddr->para) ? $faddr->para : NULL), ['class' => ($errors->has('para')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'para' ]) }}
                                        @error('para')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('ward', 'Ward')}}
                                        {{ Form::text('ward', (!empty($faddr->ward) ? $faddr->ward : NULL), ['class' => ($errors->has('ward')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'ward' ]) }}
                                        @error('ward')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('postcode', 'Post code')}}
                                        {{ Form::text('postcode', (!empty($faddr->postcode) ? $faddr->postcode : NULL), ['class' => ($errors->has('postcode')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'postcode' ]) }}
                                        @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer justify-content-between">

                            <button type="submit" class="btn btn-success">{{ __('Submit') }}</button>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
        </div>
    </div>





</div>

@push('scripts')
<script>

</script>
@endpush

@section('headcss')
<!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css"> -->
@endsection
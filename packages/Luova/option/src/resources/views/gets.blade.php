@extends('layouts.master')

@section('title', ' Options')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- @dump($fdata) -->
                <!-- /.card-header -->
                <!-- form start -->
                {{ Form::open(['method' => 'POST', 'route'=>'option.store']) }}
                {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
                <div class="card-body">
                    <div class="form-group">
                        {{ Form::label('type', 'Type')}}
                        {{ Form::select('type',config('lv_option.types'), (!empty($fdata->type) ? $fdata->type : NULL), ['class' => ($errors->has('type')? 'form-control is-invalid': 'form-control'), 'placeholder' => '--Select--' ]) }}
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

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
                        {{ Form::label('description', 'Description')}}
                        {{ Form::textarea('description', (!empty($fdata->description) ? $fdata->description : NULL), ['rows' => 3, 'placeholder' => 'Description..', 'class' => ($errors->has('description')? 'form-control is-invalid': 'form-control') ]) }}
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        {{ Form::label('sort_by', 'Positon')}}
                        {{ Form::number('sort_by', (!empty($fdata->sort_by)? $fdata->sort_by: NULL), ['class' => ($errors->has('sort_by')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Position' ]) }}
                        @error('sort_by')
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
        <div class="col-md-6">
            @php
            $option_count = count(config('lv_option.types'));
            $options = config('lv_option.types')
            @endphp
            @if($option_count > 0)
            @foreach($options as $key => $option)
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$option}}</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body  p-0">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Remarks</th>

                                <th>Status</th>
                                <th>Position</th>
                                <th style="width: 185px; text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count(lv_get_option($option)) > 0)
                            @foreach(lv_get_option($option) as $key => $data)

                            <tr>
                                <td>1.</td>
                                <td>{{$data->name}}</td>
                                <td>{{$data->remarks}}</td>

                                <td>{{($data->is_active == 'Yes')? 'Active': 'Inactiv'}}</td>
                                <td>{{$data->sort_by}}</td>

                                <td class="text-right">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>

                                        <a href="{{route('option.edit',$data->id )}}" class="btn btn-warning btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>

                                        <button type="button" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></button>
                                        <button type="button" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">

                </div>
            </div>
            @endforeach
            <!-- /.card -->

            @else


            @endif


        </div>
    </div>
    <!-- /.row -->

    {{$dataTable->table()}}




</section>
@endsection


@section('cusjs')


@endsection
@push('scripts')
{{$dataTable->scripts()}}
@endpush
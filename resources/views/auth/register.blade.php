@extends('layouts.master')

@section('content')



<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Registration</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item active">User Registration</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <a href="{{route('admin.hr.users')}}" class="btn btn-sm btn-danger">
                            <span class="material-icons">arrow_back</span> Back
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    {{ Form::open(['method' => 'POST', 'route'=>'admin.hr.user.register']) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('name', 'Name')}}

                            {{ Form::text('name', old('name'), ['class' => ($errors->has('name')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Name' ]) }}

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            {{ Form::label('name', 'E-Mail Address')}}
                            {{ Form::email('email', old('email'), ['class' => ($errors->has('email')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Email' ]) }}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Password')}}
                            {{ Form::password('password', ['class' => ($errors->has('password')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Password' ]) }}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirm Password')}}
                            {{ Form::password('password_confirmation', ['class' => ($errors->has('password_confirmation')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Password confirmation' ]) }}
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </div>
                    {{ Form::close() }}
                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>
@endsection
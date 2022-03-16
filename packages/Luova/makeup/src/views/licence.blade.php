<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/admin.min.css') }}">
</head>

<body class="hold-transition skin-purple login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ url('admin') }}">{{ config('app.name') }}</a>
        </div>
        <!-- /.login-logo -->
        @include('layouts.errors-and-messages')
        <div class="login-box-body">
            <p class="login-box-msg">Enter your licence key</p>

            <form action="{{ route('admin.licence.save') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input name="email" type="email" class="form-control" placeholder="Email"
                        value="{{ old('email') }}">
                    <span class="fa fa-envelope form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-8">

                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <script src="{{ asset('js/admin.min.js') }}"></script>
</body>

</html>
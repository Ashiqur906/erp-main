<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Home</title>


    @include('frontend.layouts.essential.headasset')

    @stack('head')
</head>

<body>
    <div id="app">
        <div class="wrapper">

            @include('frontend.layouts.essential.header')
            <div class="content-wrapper">


                @yield('content')
            </div>

            @include('frontend.layouts.essential.footer')


        </div>
    </div>

    @include('frontend.layouts.essential.footasset')
    @stack('footer')
</body>

</html>
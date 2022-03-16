@extends('layouts.master')
@section('title', ' Media')

@section('content')



<section v-cloak>

    <div class="notif-container">
        <my-notification></my-notification>
    </div>

    <div class="container is-fluid">
        <div class="columns">

            <div class="column">
                @include('MediaManager::_manager')
            </div>
        </div>
    </div>
</section>




<!-- ./wrapper -->
@endsection
@stack('styles')
@stack('scripts')


@section('headcss')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
@endsection
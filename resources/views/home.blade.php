@extends('layouts.master')
@section('title', ' Home')
@section('content')





<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @role('Admin')
        @include('deshboard.admin')

        @endrole

        @role('Editor')
        @include('deshboard.editor')
        @endrole
        @role('Vendor')
        @include('deshboard.vendor')

        @endrole
        @role('Deliveryman')
        @include('deshboard.deliveryman')

        @endrole

        <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<!-- ./wrapper -->
@endsection
@stack('styles')
@stack('scripts')
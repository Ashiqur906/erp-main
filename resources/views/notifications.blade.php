@extends('layouts.master')

@section('title', 'All Notification')
@section('sub_title', ' ')
@section('content')
<section class="content">


    <div class="row">

        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">All Notification</h3>

                </div>
                <!-- /.card-header -->

                <div class="card-body">


                    {!! $dataTable->table([], false) !!}
                </div>


                <!-- /.card-body -->



            </div>
        </div>

    </div>
    <!-- /.row -->

    <div class="modal fade" id="modalAjax">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header  bg-info text-center">
                    <h4 class="modal-title">Change Status</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route'=>'admin.booking.status.change']) }}

                <div class="modal-body" id="modelAjaxView">

                </div>
                <div class="modal-footer ">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


</section>
@endsection


@section('cusjs')
<style>
    .short-table p {
        margin-bottom: 0px;
    }

    .short-table p b {

        font-size: 13px;
        padding: 1px 4px;
        border-radius: 2px;
        cursor: pointer;
        margin-right: 3px;
    }
</style>



@endsection

@push('scripts')


<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="{{asset('/vendor/datatables/buttons.server-side.js')}}"></script>


{!! $dataTable->scripts() !!}


@endpush
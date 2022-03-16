@extends('layouts.master')
@section('title', ' Receipts')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('receipt.add')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">add_circle_outline</span> New Receipts
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Voucher Type</th>
                                    <th>Narratione</th>
                                    <th>Invoice Date</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th style="width: 185px; text-align:center">Actions</th>

                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
                <!-- /.card -->


            </div>
        </div>




        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>



<!-- ./wrapper -->
@endsection

@push('scripts')


<script>
    $(document).ready(function() {
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('account.journal') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'voucher_type',
                    name: 'voucher_type'
             
                }, {
                    data: 'narration',
                    name: 'narration'
             
                }, {
                    data: 'invoice_date',
                    name: 'invoice_date'
                }, {
                    data: 'amount',
                    name: 'amount'
                },
                {
                    data: 'status',
                    name: 'status'
                },{
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]

        });

    });
</script>


@endpush
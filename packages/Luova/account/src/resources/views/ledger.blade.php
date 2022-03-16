@extends('layouts.master')
@section('title', ' Ledgers')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Ledgers
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Account</th>
                                    <th>Account Head</th>
                                    <th>Debit</th>
                                    <th>Credit </th>                                 
                                    <th style="">Created At</th>

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
        $('#user_table').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('account.ledger') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'account',
                    name: 'account'
             
                }, {
                    data: 'account_head',
                    name: 'account_head'
             
                }, {
                    data: 'debit',
                    name: 'debit'
                }, {
                    data: 'credit',
                    name: 'credit'
                },{
                    data: 'created_at',
                    name: 'created_at'
                }
            ]

        });

    });
</script>


@endpush
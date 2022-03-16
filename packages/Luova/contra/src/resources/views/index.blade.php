@extends('layouts.master')
@section('title', ' Sales')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('sale.add')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">add_circle_outline</span> New sales
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Narratione</th>
                                    <th>Invoice Date</th>
                                    <th>Party A/C</th>
                                    <th>sale Ledger</th>
                                
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>VAT/TAX</th>
                                    <th>Round Of</th>
                                    <th>G. Total</th>
                                    <th>Status</th>
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
                url: "{{ route('sale.all') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'narration',
                    name: 'narration'
             
                }, {
                    data: 'invoice_date',
                    name: 'invoice_date'
                }, {
                    data: 'party_ac',
                    name: 'party_ac'
                }, {
                    data: 'sale_ledger',
                    name: 'sale_ledger'
                }, {
                    data: 'total',
                    name: 'total'
                }, {
                    data: 'discount',
                    name: 'discount'
                }, {
                    data: 'vat',
                    name: 'vat'
                },
                {
                    data: 'round_of',
                    name: 'round_of'
                },
                {
                    data: 'grand_total',
                    name: 'grand_total'
                },
                {
                    data: 'status',
                    name: 'status'
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
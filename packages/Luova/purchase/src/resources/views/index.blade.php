@extends('layouts.master')
@section('title', ' Purchases')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('purchase.add')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">add_circle_outline</span> New Purchases
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>S. Invoice</th>
                                    <th>Invoice Date</th>
                                    <th>Party A/C</th>
                                    <th>Purchase Ledger</th>
                                    <th>Date</th>
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
                url: "{{ route('purchase.all') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'supplier_invoice',
                    name: 'supplier_invoice'
                }, {
                    data: 'invoice_date',
                    name: 'invoice_date'
                }, {
                    data: 'party_ac',
                    name: 'party_ac'
                }, {
                    data: 'purchase_ledger',
                    name: 'purchase_ledger'
                }, {
                    data: 'date',
                    name: 'date'
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
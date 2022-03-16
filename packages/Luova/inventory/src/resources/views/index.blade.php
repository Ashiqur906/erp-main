@extends('layouts.master')
@section('title', ' Products')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('product.add')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">add_circle_outline</span> Product
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Code</th>
                                    <th>Sales price</th>
                                    <th>Stock In</th>
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
                url: "{{ route('product.all') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'code',
                    name: 'code'
                },
                {
                    data: 'sales_price',
                    name: 'sales_price'
                },
                {
                    data: 'stock_in',
                    name: 'stock_in'
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
@extends('layouts.master')
@section('title', ' Journal details')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('account.journal')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">keyboard_backspace</span> Back
                        </a>
                        <a href="{{route('receipt.add')}}" class="btn btn-sm btn-danger float-right">
                            <span class="material-icons">print</span> Print
                        </a>
                    </div>

                    <!-- /.card-header -->
                  
                </div>
                <!-- /.card -->


            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                       <div class="row">
                           <div class="col-md-6">
                                <b> Voucher Date : </b> {{ ($mdata->invoice_date)? date('d-M-Y', strtotime($mdata->invoice_date)):null }}<br>
                                <b> Narration : </b> {{ ($mdata->narration)? $mdata->narration:null }}
                           </div>
                           <div class="col-md-6 text-right">
                           
                            <b>Voucher No : </b> {{ ($mdata->id)? $mdata->id:null }}
                           </div>
                       </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
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
                            <tbody>
                                @foreach($mdata->ledgers as $key => $value)
                                    
                              
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->account->title . ' ['. $value->account->code.']' }}</td>
                                    <td>{{ $value->account->head->title }}</td>
                                    <td>{{ money($value->debit) }}</td>
                                    <td>{{ money($value->credit) }}</td>
                                 
                                    <td>{{ ($value->created_at)?date('d-M-Y H:i a',strtotime($value->created_at)): null }}</td>
                                </tr>
                                @endforeach

                            </tbody>

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


    });
</script>


@endpush
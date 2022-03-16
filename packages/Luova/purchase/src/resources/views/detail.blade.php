@extends('layouts.master')
@section('title', 'Purchase Details')
@section('content')


@php

$rn = 0;

@endphp

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Purchase Details</h3>
                    </div>
                    <!-- @dump($fdata) -->
                    <!-- /.card-header -->
                    <!-- form start -->

                  

                    <div class="card-body">

                        <div class="row" id="RecieptHead">
                            <div class="col-md-8 ">
                               


                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Supplier invoice no</b>
                                    </div>
                                    <div class="col-sm-4">
                                        {{$fdata->supplier_invoice}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Invoice Date </b>
                                    </div>
                                    <div class="col-sm-4">
                                        {{$fdata->invoice_date}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Party A/c </b>
                                    </div>
                                    <div class="col-sm-4">
                                        {{ ($fdata->party)?$fdata->party->title.' ['.$fdata->party->code.']': null }}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <b>Purchase ledger </b>
                                    </div>
                                    <div class="col-sm-4">
                                        {{ ($fdata->PLedger)?$fdata->PLedger->title.' ['.$fdata->PLedger->code.']': null }}
                                    </div>
                                </div>
                             
                                
                         

                            </div>

                            <div class="col-4">
                                <div class="form-group row">
                                    <div class="col-sm-6 text-right">
                                        <b>Purchase invoice no </b>
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $fdata->id }}
                                    </div>                        
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 text-right">
                                        <b>Date</b>
                                    </div>
                                    <div class="col-sm-6">
                                        {{ $fdata->date }}
                                    </div>                        
                                </div>
                   

                            </div>
                        </div>

                        {{-- @dump($fdata->details) --}}

                        <table class="table  table-sm table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 50%">Name of Item</th>
                                    <th style="width: 10%"></th>
                                    <th style="width: 10%">Quantity</th>
                                    <th style="width: 10%">Rate per</th>
                                    <th style="width: 15%">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($fdata->details)
                                @foreach($fdata->details as $item)
                                <tr>
                                    <td>
                                      {{$item->id}}
                                    </td>
                                    <td>
                                        {{ ($item->product)?$item->product->title.' ['.$item->product->code.']': null }}
                                    </td>
                                    <td></td>
                                    <td>
                                        {{$item->qty}}
                                    </td>
                                    <td>
                                        {{$item->rate}}
                                    </td>
                                    <td>
                                        {{$item->total}}
                                    </td>
                                
                              
                                
                                </tr>
                                @endforeach
                                @endif

                            </tbody>
                            <tfoot style="border-top: 6px double #d4d4d4;">
                          
                                <tr>
                                    <td colspan="5" class="text-right font-weight-bold" style="border-top: 0">Total Amount</td>
                                    <td style="border-top: 0">
                                        {{ $fdata->total }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right font-weight-bold" style="border-top: 0">Discount</td>
                                    <td style="border-top: 0">
                                        {{ $fdata->discount }}
                                   </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right font-weight-bold" style="border-top: 0">Vat/Tax</td>
                                    <td style="border-top: 0">
                                        {{ $fdata->vat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right font-weight-bold" style="border-top: 0">Round Of</td>
                                    <td style="border-top: 0">
                                        {{ $fdata->round_of }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right  font-weight-bold" style="border-top: 0">Grand Total</td>
                                    <td style="border-top: 0">
                                        {{ $fdata->grand_total }}
                                   </td>
                                </tr>

                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->

                   

                </div>
            </div>



        </div>

        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>



<!-- ./wrapper -->
@endsection




@push('scripts')




@endpush

@push('headcss')

@php


// dump(productFA());
@endphp
<style>
    #RecieptHead .form-group {
        margin-bottom: 5px !important;
    }
</style>
@endpush
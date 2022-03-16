@extends('layouts.master')
@section('title',  (!empty($fdata->id) ? 'Edit Payment Voucher' : 'New  Payment Voucher'))
@section('content')


@php

$rn = 0;
if(Session::has('myexcep')){
    dump(Session::get('myexcep'));
}
@endphp

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        {{ Form::open(['method' => 'POST', 'route'=>'payment.store']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title mb-0">Payment Voucher</h3>
                    </div>
                    <!-- @dump($fdata) -->
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}

                    <div class="card-body">

                        <div class="row" id="RecieptHead">
                            <div class="col-md-8 ">

                                <div class="form-group row">

                                    {{ Form::label('invoice_date', 'Voucher Date',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-4">
                                        {{ Form::text('invoice_date', (!empty($fdata->invoice_date) ? $fdata->invoice_date : NULL), ['class' => (($errors->has('invoice_date')? 'is-invalid ': '').'form-control datepicker'), 'placeholder' => 'Voucher Date' ]) }}
                                    </div>
                                    @error('invoice_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                        
                                <div class="form-group row">

                                  
                                    {{ Form::label('narration', 'Narration',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-6">
                                        {{ Form::text('narration',(!empty($fdata->narration) ? $fdata->narration : NULL), ['class' => (($errors->has('narration')? 'is-invalid': ''). ' form-control'), 'placeholder' => 'Narration' ]) }}
                                        @error('narration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
            
                                    </div>

                                </div>
                  


                            </div>

                            <div class="col-4">
                                <div class="form-group row">
                                    {{ Form::label('id', 'Payment voucher no',['class' => 'col-sm-6 text-right col-form-label'])}}
                                    <div class="col-sm-6">
                                        {{ Form::text('',  (!empty($fdata->id) ? $fdata->id : 'Auto Generate'), ['class' =>  'form-control','readonly' => true ]) }}
                                    </div>
                                </div>
                     
                          

                            </div>
                        </div>

                        <table class="table  table-sm table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 5%"></th>
                                    <th style="width: 35%">Particulars</th>
                                    <th style="width: 10%">Balance</th>
                                    <th style="width: 15%"></th>
                                    <th style="width: 15%">Debit</th>
                                    <th style="width: 15%">Credit</th>
                                  
                                </tr>
                            </thead>
                            <tbody id="appendRow">
                                @if($olds = old('item'))
                                {{-- Start Validation Old form data  --}}
                                @include('payment::part.old_form', ['rows' => $olds])
                                @php
                                $rn = array_key_last($olds);
                                @endphp
                                {{-- End Validation Old form data  --}}
                                @elseif($fdata && $fdata->details)
                                {{-- Start Edit form data  --}}
                                @include('payment::part.edit_form', ['rows' => $fdata->details])
                                @php
                                $rn = $fdata->details->keys()->last() + 1;
                                @endphp
                                 {{-- End Edit form data  --}}
                                @else
                                @php
                                $default_form = [1,2];
                                $rn = 2;
                                @endphp
                                @include('payment::part.default_form', ['rows' => $default_form])

                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" class="text-center" style="border-top: 0">
                                        &nbsp;
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center" style="border-top: 0">
                                        <button class="btn btn-primary btn-sm" onclick="append_row();" type="button">
                                            <span class="material-icons"> add_circle </span> Add More
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center" style="border-top: 0">
                                        &nbsp;
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Total Amount</td>

                                    <td style="border-top: 0">
                                        {{ Form::text('total_debit', (!empty($fdata->total_debit) ? $fdata->total_debit : NULL), ['class' => ($errors->has('total_debit')? 'form-control is-invalid': 'form-control'), 'id' => 'total_debit' ,'readonly' => true]) }}
                                        @error('total_debit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                    <td style="border-top: 0">
                                        {{ Form::text('total_credit', (!empty($fdata->total_credit) ? $fdata->total_credit : NULL), ['class' => ($errors->has('total_credit')? 'form-control is-invalid': 'form-control'), 'id' => 'total_credit' ,'readonly' => true]) }}
                                        @error('total_credit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                   
                                    </td>
                                </tr>
                              

                            </tfoot>
                        </table>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success btn-lg" id="submitForm" disabled>{{ __('Submit') }}</button>
                    </div>

                </div>
            </div>



        </div>
        {{ Form::close() }}
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>



<!-- ./wrapper -->
@endsection




@push('scripts')


<script>
    var count = "{{$rn + 1}}";
    count = Number(count);
    master_function();
    jQuery(document).ready(function($) {

        // master_function();
        $(document).on('click', '.removeRow', function(e) {
            var id = $(this).data('id');

            $('#row-' + id).remove();

        });
        $(document).on('blur', '#discount', function(e) {
            master_function();
        });
        $(document).on('blur', '#vat', function(e) {
            master_function();
        });

        $(document).on('change', 'input[name="price_type"]', function(e) {

            $('.item-product :selected').each(function() {
                let pid = $(this).val();
                if(pid){
                    selectProduct(this);
                    $(this).closest('tr').find('.item-qty').val('');
                    $(this).closest('tr').find('.item-total').val('');
                }
                
            });         

            master_function();
        });



    });

    function append_row() {
        var $ = jQuery;
        
            let route = "{{ route('payment.ajax.rowitem') }}";
            var rows = count;
            $.ajax({
                type:'GET',
                url:route,
                data:{
                    rows:rows
                },
                success:function(data){
                    console.log(data.html);
                    $('#appendRow').append(data.html);
                     count = count + 1;
                }
            });
    }
    function selectAccount(self) {
        var $ = jQuery;
        var pid = $(self).val();
        var type = $(self).closest('tr').find('.item-type').val();
       // alert(type);
     
        if(pid){
            //alert(pid);
            let route = "{{ route('payment.ajax.account') }}";
            var rows = count;
            $.ajax({
                type:'GET',
                url:route,
                data:{
                    pid:pid
                },
                success:function(data){
                    if(data.valid){
                        //purchase_price
                        //alert(data.purchase_price)
                        $(self).closest('tr').find('.item-balance').html(data.balance);
                        $(self).closest('tr').find('.item-currency').html(data.currency);
                        if(type =='Dr'){
                            $(self).closest('tr').find('.item-debit').attr('data-debit',data.balance);
                            $(self).closest('tr').find('.item-debit').prop("readonly",false);
                            $(self).closest('tr').find('.item-credit').val('');
                            $(self).closest('tr').find('.item-credit').prop("readonly",true);
                        }else{
                            $(self).closest('tr').find('.item-debit').attr('data-credit',data.balance);
                            $(self).closest('tr').find('.item-debit').prop("readonly",true);
                            $(self).closest('tr').find('.item-debit').val('');
                            $(self).closest('tr').find('.item-credit').prop("readonly",false);
                        }                                                                  
                    }
             
                }
            });
        }else{
            alert('Please selcet Price type and product');
        }
       
    }
    function insertQty(self) {
        var $ = jQuery;
        var qty = $(self).val();
        var rate = $(self).closest('tr').find('.item-rate').val();
        var total = 0;
        if(qty && rate && qty > 0){
            total = qty*rate;
        }
        $(self).closest('tr').find('.item-total').val(round2Fixed(total));
        master_function();
    }
    function insertCredit(self) {
        var $ = jQuery;
        var credit = $(self).val();
        var balance = $(self).data('credit');
        if(balance){
            balance = balance;
        }else{
            balance = 0;
        }
        var bl =  parseFloat(balance)  +  parseFloat(credit);
        $(self).closest('tr').find('.item-balance').html(bl);
        master_function();
       
    }
    function insertDebit(self) {
        var $ = jQuery;
        var debit = $(self).val();
        var balance = $(self).data('debit');
        $(self).closest('tr').find('.item-balance').html(balance - debit);
        master_function();
    }

    function master_function() {
            var $ = jQuery;
            var total_debit = 0;
            var total_credit = 0;
  
            $('.item-debit').each(function() {
                var debit = $(this).val();
                if(debit){
                    total_debit += parseFloat(debit);
                }
            });
            $('.item-credit').each(function() {
                var credit = $(this).val();
                if(credit){
                    total_credit += parseFloat(credit);
                }
            });

            $("#total_debit").val(total_debit);
            $("#total_credit").val(total_credit);
            if(total_credit > 0 && total_credit > 0 && total_credit == total_debit){
                $("#submitForm").prop("disabled",false);
            }else{
                $("#submitForm").prop("disabled",false);
            }
           


        }

        function selectType(self) {
         
        }
        function round2Fixed(value) {
            value = +value;

            if (isNaN(value))
                return NaN;

            // Shift
            value = value.toString().split('e');
            value = Math.round(+(value[0] + 'e' + (value[1] ? (+value[1] + 2) : 2)));

            // Shift back
            value = value.toString().split('e');
            return (+(value[0] + 'e' + (value[1] ? (+value[1] - 2) : -2))).toFixed(2);
        }
</script>


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
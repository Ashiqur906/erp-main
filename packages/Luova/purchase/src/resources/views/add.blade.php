@extends('layouts.master')
@section('title',  (!empty($fdata->id) ? 'Edit Purchase' : 'New Purchase'))
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
        {{ Form::open(['method' => 'POST', 'route'=>'purchase.store']) }}
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title mb-0">{{  (!empty($fdata->id) ? 'Edit Purchase' : 'New Purchase') }} </h3>
                    </div>
                    <!-- @dump($fdata) -->
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}

                    <div class="card-body">

                        <div class="row" id="RecieptHead">
                            <div class="col-md-8 ">
                               


                                <div class="form-group row">

                                    {{ Form::label('supplier_invoice', 'Supplier invoice no',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-4">
                                        {{ Form::text('supplier_invoice', (!empty($fdata->supplier_invoice) ? $fdata->supplier_invoice : NULL), ['class' => (($errors->has('supplier_invoice')? 'is-invalid':''). ' form-control'), 'placeholder' => 'Supplier Invoice No' ]) }}

                                    </div>
                                    @error('supplier_invoice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group row">

                                    {{ Form::label('invoice_date', 'Invoice Date',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-4">
                                        {{ Form::text('invoice_date', (!empty($fdata->invoice_date) ? $fdata->invoice_date : NULL), ['class' => (($errors->has('invoice_date')? 'is-invalid ': '').'form-control datepicker'), 'placeholder' => 'Invoice Date' ]) }}
                                    </div>
                                    @error('invoice_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group row">

                                  
                                    {{ Form::label('party_ac', 'Party A/c name',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-4">
                                        {{ Form::select('party_ac', AccountSelect(12),(!empty($fdata->party_ac) ? $fdata->party_ac : NULL), ['class' => (($errors->has('party_ac')? 'is-invalid': ''). ' form-control select2'), 'placeholder' => 'Select' ]) }}
                                        @error('party_ac')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
            
                                    </div>

                                </div>
                                <div class="form-group row">

                                  
                                    {{ Form::label('purchase_ledger', 'Purchase ledger',['class' => 'col-sm-2 col-form-label'])}}
                                    <div class="col-sm-4">
                                        {{ Form::select('purchase_ledger', AccountSelect(1),(!empty($fdata->purchase_ledger) ? $fdata->purchase_ledger : NULL), ['class' => (($errors->has('purchase_ledger')? 'is-invalid': ''). ' form-control select2'), 'placeholder' => 'Select' ]) }}
                                        @error('purchase_ledger')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
            
                                    </div>

                                </div>
                  


                            </div>

                            <div class="col-4">
                                <div class="form-group row">
                                    {{ Form::label('id', 'Purchase invoice no',['class' => 'col-sm-6 text-right col-form-label'])}}
                                    <div class="col-sm-6">
                                        {{ Form::text('',  (!empty($fdata->id) ? $fdata->id : 'Auto Generate'), ['class' =>  'form-control','readonly' => true ]) }}
                                    </div>
                                </div>
                                <div class="form-group row">

                                    {{ Form::label('date', 'Date',['class' => 'col-sm-6 text-right col-form-label'])}}
                                    <div class="col-sm-6">
                                        {{ Form::text('date', (!empty($fdata->date) ? $fdata->date : NULL), ['class' => (($errors->has('date')? 'is-invalid ': '').'form-control datepicker'), 'placeholder' => 'Date' ]) }}
                                    </div>
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>
                        </div>

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
                            <tbody id="appendRow">
                                @if($olds = old('item'))
                                {{-- Start Validation Old form data  --}}
                                @include('purchase::part.old_form', ['rows' => $olds])
                                @php
                                $rn = array_key_last($olds);
                                @endphp
                                {{-- End Validation Old form data  --}}
                                @elseif($fdata && $fdata->details)
                                {{-- Start Edit form data  --}}
                                @include('purchase::part.edit_form', ['rows' => $fdata->details])
                                @php
                                $rn = $fdata->details->keys()->last() + 1;
                                @endphp
                                 {{-- End Edit form data  --}}
                                @else
                                @php
                                $default_form = [1,2,3,4,5];
                                $rn = 5;
                                @endphp
                                @include('purchase::part.default_form', ['rows' => $default_form])

                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="text-center" style="border-top: 0">
                                        &nbsp;
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="6" class="text-center" style="border-top: 0">
                                        <button class="btn btn-primary btn-sm" onclick="append_row();" type="button">
                                            <span class="material-icons"> add_circle </span> Add More
                                        </button>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="6" class="text-center" style="border-top: 0">
                                        &nbsp;
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Total Amount</td>
                                    <td style="border-top: 0">
                                        {{ Form::text('total', (!empty($fdata->total) ? $fdata->total : NULL), ['class' => ($errors->has('total')? 'form-control is-invalid': 'form-control'), 'id' => 'total' ,'readonly' => true]) }}
                                        @error('total')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Discount</td>
                                    <td style="border-top: 0">
                                        {{ Form::text('discount', (!empty($fdata->discount) ? $fdata->discount : NULL), ['class' => ($errors->has('discount')? 'form-control is-invalid': 'form-control'), 'id' => 'discount' ]) }}
                                        @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Vat/Tax</td>
                                    <td style="border-top: 0">
                                        {{ Form::text('vat', (!empty($fdata->vat) ? $fdata->vat : NULL), ['class' => ($errors->has('vat')? 'form-control is-invalid': 'form-control'), 'id' => 'vat' ]) }}
                                        @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Round Of</td>
                                    <td style="border-top: 0">
                                        {{ Form::text('round_of', (!empty($fdata->round_of) ? $fdata->round_of : NULL), ['class' => ($errors->has('round_of')? 'form-control is-invalid': 'form-control'), 'id' => 'round_of' ,'readonly' => true]) }}
                                        @error('round_of')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-right" style="border-top: 0">Grand Total</td>
                                    <td style="border-top: 0">
                                        {{ Form::text('grand_total', (!empty($fdata->grand_total) ? $fdata->grand_total : NULL), ['class' => ($errors->has('grand_total')? 'form-control is-invalid': 'form-control'), 'id' => 'grand_total' ,'readonly' => true]) }}
                                        @error('grand_total')
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
                        <button type="submit" class="btn btn-success btn-lg  ">{{ __('Submit') }}</button>
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



    });

    function append_row() {
        var $ = jQuery;
        
            let route = "{{ route('purchase.ajax.rowitem') }}";
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
    function selectProduct(self) {
        var $ = jQuery;
        var pid = $(self).val();
        if(pid){
            //alert(pid);
            let route = "{{ route('purchase.ajax.product') }}";
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
                         $(self).closest('tr').find('.item-rate').val(data.purchase_price);
                         $(self).closest('tr').find('.item-unit').html(data.unit);
                         $(self).closest('tr').find('.item-rate').prop("readonly",false);
                         $(self).closest('tr').find('.item-qty').prop("readonly",false);

                    }
             
                }
            });
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
    function insertRate(self) {
        var $ = jQuery;
        var qty = $(self).closest('tr').find('.item-qty').val();
        var rate = $(self).val();
        var total = 0;
        if(qty && rate && qty > 0){
            total = qty*rate;
        }
        $(self).closest('tr').find('.item-total').val(round2Fixed(total));
        master_function();
       

    }

    function master_function() {
            var $ = jQuery;
            var total = 0;
            var discount = 0;
            var vat = 0;
            var tax = 0;
            var round_of = 0;
            var grand_total = 0;
            $('.item-total').each(function() {
                var itemTotal = $(this).val();
                if(itemTotal){
                    total += parseFloat(itemTotal);
                }
            });
            console.log(total);
            total = round2Fixed(total); 

            if($('#discount').val()){
                discount =$('#discount').val();
            }
            discount = parseFloat(discount); 
           

            if($('#vat').val()){
                vat =$('#vat').val();
            }
            vat = parseFloat(vat); 


            grand_total = (total-discount+vat);
            console.log(grand_total);
            round_total = Math.round(grand_total); 
            console.log(round_total);
            round_of = round2Fixed(round_total-grand_total);

            $("#total").val(total);
            $("#discount").val(discount);
            $("#vat").val(vat);
            $("#round_of").val(round_of);
            $("#grand_total").val(round_total);
            // $("#TaxDiscount").val(t_discount);
            // $("#TaxFine").val(t_fine);
            // $("#totalGrandTax").val(t_total);
            // $("#hidendData").html(html);


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
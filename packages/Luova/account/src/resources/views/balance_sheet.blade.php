@extends('layouts.master')
@section('title', 'Balance Sheet')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                       
                        <a href="{{route('receipt.add')}}" class="btn btn-sm btn-danger float-right">
                            <span class="material-icons">print</span> Print
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50%" colspan="2">Liabilities</th>
                                    <th style="width: 50%" colspan="2">Assets</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 0" colspan="2">
                                        <table style="width: 100%" class="table  table-striped table-borderless">
                                            @php
                                                $total_lib = 0;
                                                $total_ass = 0;


                                            @endphp
                                        
                                            @foreach($liabilities as $key => $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>
                                                
                                                   
                                                </td>
                                                <td class="text-right">
                                                    @if($value->ledgers)
                                                    @php
                                                        $total = $value->ledgers()->sum('credit') - $value->ledgers()->sum('debit');
                                                        $total_lib += round($total,2);
                                                    @endphp
                                                    
                                                    {{ money($total) }}
                                                    @endif
                                                   
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                     
                                           

                                          
                                      
                                            @foreach($bs_pal as $key => $value)
                                            <tr>
                                                <td><b>{{ $value['name'] }}</b></td>
                                                <td>
                                                   
                                                   
                                                </td>
                                                <td class="text-right">
                                                    @php
                                                                                                    
                                                    $total_lib += round($value['total'],2);
                                                @endphp
                                                    {{ money($value['total']) }}
                                                  
                                                </td>
                                            </tr>
                                    
                                            @foreach($value['data'] as $key => $list)
                                         
                                            <tr>
                                                <td><i class="bl-sub">{{ $list['name'] }}</i></td>
                                                <td class="text-right">
                                                   <i> {{ money($list['amount']) }}    </i>           
                                                </td>
                                                <td class="text-right"> </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                           
                                           
                                          
                                        </table>

                                    </td>
                                    <td style="padding: 0" colspan="2">
                                        <table class="table  table-striped table-borderless" style="width: 100%">
                                            @foreach($assets as $key => $value)
                                            <tr>
                                                <td>{{ $value->title }}</td>
                                                <td>
                                                   
                                                   
                                                </td>
                                                <td class="text-right">
                                                    @if($value->ledgers)
                                                    @php
                                                        $total = $value->ledgers()->sum('debit') - $value->ledgers()->sum('credit');                                                        
                                                        $total_ass += round($total,2);
                                                    @endphp
                                                
                                                    {{ money($total) }}
                                                    @endif
                                                   
                                                </td>
                                            </tr>

                                            @endforeach
                                       
                                          
                                          
                                            @foreach($bs_assets as $key => $value)
                                            <tr>
                                                <td><b>{{ $value['name'] }}</b></td>
                                                <td>
                                                   
                                                   
                                                </td>
                                                <td class="text-right">
                                                    @php
                                                                                                    
                                                    $total_ass += round($value['total'],2);
                                                @endphp
                                                    {{ money($value['total']) }}
                                                  
                                                </td>
                                            </tr>
                                    
                                            @foreach($value['data'] as $key => $list)
                                         
                                            <tr>
                                                <td><i class="bl-sub">{{ $list['name'] }}</i></td>
                                                <td class="text-right">
                                                   <i> {{ money($list['amount']) }}    </i>           
                                                </td>
                                                <td class="text-right"> </td>
                                            </tr>
                                            @endforeach
                                            @endforeach

                                          
                                          
                                        </table>

                                    </td>
                                </tr>
                                
                             

                            </tbody>
                            <tfoot>
                                <th class="text-right" style="width: 25%; border-right:0">
                                   Total
                                </th>
                                <th class="text-right" style="width: 25%; border-left:0">
                                    {{ money($total_lib) }}
                                </th>
                                <th class="text-right" style="width: 25%; border-right:0">
                                    Total
                                </th>
                                <th class="text-right" style="width: 25%; border-left:0">
                                    {{ money($total_ass) }}
                                </th>
                            </tfoot>

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


<s>
    $(document).ready(function() {


    });
</s>


@endpush
@push('headcss')


<style>
i.bl-sub {
    padding-left: 50px;
}

</style>


@endpush
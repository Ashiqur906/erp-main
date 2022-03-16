@extends('layouts.app')

@section('title', ' ঠিকানা ')
@section('sub_title', ' ')
@section('content')
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-danger">

                        <div class="box-body" id="my-app">

                            {{ Form::open(array('route' => 'direction.index', 'method' => 'get', 'value' => 'PATCH', 'id' => '')) }}
                            <div class="row">



                                <div class="col-md-11">
                                    <div class="row" id="search-box">
                                        <div class="col-md-2" style="padding-left: 15px;">
                                            <div class="form-group">


                                                <select class='form-control' v-model='division' name="division" @change="getDistricts()">
                                                    <option value=''>-- Division --</option>
                                                    <option v-for='data in divisions' :value='data.division' v-html="data.division"></option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='district' @change="getThanas()" name="district">
                                                    <option value=''>-- District --</option>
                                                    <option v-for='data in districts' :value='data.district' v-html="data.district"></option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='thana' name="thana" @change="getUnionToWard()">
                                                    <option value=''>-- Thana --</option>
                                                    <option v-for='data in thanas' :value='data.thana' v-html="data.thana"></option>
                                                </select>



                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='union' name="union" @change="getUnionToWard()">
                                                    <option value=''>-- union --</option>
                                                    <option v-for='data in unions' :value='data.union' v-html="data.union"></option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='postoffice' name="postoffice" @change="getUnionToWard()">
                                                    <option value=''>-- Postoffice --</option>
                                                    <option v-for='data in postoffices' :value='data.postoffice' v-html="data.postoffice"></option>
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <select class='form-control' v-model='postcode' name="postcode" @change="getUnionToWard()">
                                                    <option value=''>-- Postcode --</option>
                                                    <option v-for='data in postcodes' :value='data.postcode' v-html="data.postcode"></option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='village' name="village" @change="getUnionToWard()">
                                                    <option value=''>-- Village --</option>
                                                    <option v-for='data in villages' :value='data.village' v-html="data.village"></option>
                                                </select>



                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <select class='form-control' v-model='ward' name="ward">
                                                    <option value=''>-- ward --</option>
                                                    <option v-for='data in wards' :value='data.ward' v-html="data.ward"></option>
                                                </select>



                                            </div>
                                        </div>

                                    </div>
                                </div>




                                <div class="col-xs-1">
                                    {{ Form::submit('Search', [ 'name' => 'submit','class' => 'btn btn-success']) }}


                                </div>
                            </div>
                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title box-success">
                        ঠিকানা সমূহ &nbsp; &nbsp;
                        <a href="{{ route('direction.add') }}" class="btn btn-xs btn-success">
                            <i class="fa fa-plus"></i>
                        </a>

                    </h3>

                </div>
                @if($mdata)
                <div class="box-body" style="">

                    <table class="table table-striped table-responsive">
                        <tr>
                            <th style="width: 10px;"> # </th>
                            <th>Division</th>
                            <th>District </th>
                            <th>Thana </th>
                            <th>Union </th>
                            <th>Postoffice </th>
                            <th>Postcode </th>
                            <th>Village </th>
                            <th>ward </th>
                            <th>Para </th>
                            <th style="text-align: right; width:120px">
                                একশন
                            </th>
                        </tr>

                        <!-- @dump($mdata) -->



                        @php
                        $prepage = ($mdata->perPage() * ($mdata->currentPage() - 1) +1 );
                        @endphp


                        @foreach($mdata as $key => $data)
                        <tr>
                            <td data-value="ID">{{ $prepage + $key }}</td>
                            <td>{{ ($data->division)?$data->division : '--'}} </td>
                            <td>{{ ($data->district)?$data->district : '--'}} </td>
                            <td>{{ ($data->thana)?$data->thana : '--'}} </td>
                            <td>{{ ($data->union)?$data->union : '--'}} </td>
                            <td>{{ ($data->postoffice)?$data->postoffice : '--'}} </td>
                            <td>{{ ($data->postcode)?$data->postcode : '--'}} </td>
                            <td>{{ ($data->village)?$data->village : '--'}} </td>
                            <td>{{ ($data->ward)?$data->ward : '--'}} </td>
                            <td>{{ ($data->para)?$data->para : '--'}} </td>
                            <td>
                                <div class="btn-group btn-group-sm pull-right">
                                    <a href="{{ route('direction.edit', $data->id)}}" class="btn btn-info" target="_blank">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('direction.copy', $data->id)}}" class="btn btn-warning" target="_blank">
                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                    </a>

                                    <a href="{{ route('direction.delete', $data->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $mdata->links('component.paginator', ['object' => $mdata]) }}
                </div>
                @endif
            </div>
        </div>



    </div>
    <!-- /.row -->


</section>
@endsection


@section('cusjs')
<style>
    div.dataTables_wrapper div.dataTables_filter {
        width: 100%;
        float: none;
        text-align: center;
    }

    .pagination>li>a,
    .pagination>li>span {

        padding: 2px 6px !important;

    }

    #search-box>.col-md-2,
    #search-box>.col-md-1 {
        padding-left: 2px;
        padding-right: 2px;
    }
</style>

<script>
    var myapp = new Vue({
        el: "#my-app",
        data: {

            division: "{{(!empty(Request::get('division')) ? Request::get('division') : '')}}",
            divisions: [],
            district: "{{(!empty(Request::get('district')) ? Request::get('district') : '')}}",
            districts: [],
            thana: "{{(!empty(Request::get('thana')) ? Request::get('thana') : '')}}",
            thanas: [],
            union: "{{(!empty(Request::get('union')) ? Request::get('union') : '')}}",
            unions: [],
            postoffice: "{{(!empty(Request::get('postoffice')) ? Request::get('postoffice') : '')}}",
            postoffices: [],
            postcode: "{{(!empty(Request::get('postcode')) ? Request::get('postcode') : '')}}",
            postcodes: [],
            village: "{{(!empty(Request::get('village')) ? Request::get('village') : '')}}",
            villages: [],
            ward: "{{(!empty(Request::get('ward')) ? Request::get('ward') : '')}}",
            wards: [],
            para: ''



        },
        methods: {
            getDivision: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'division'
                    }
                }).then(function(response) {
                    this.divisions = response.data.data;

                }.bind(this));

            },
            getDistricts: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'district',
                        division: this.division
                    }
                }).then(function(response) {
                    this.districts = response.data.data;
                }.bind(this));
            },
            getThanas: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'thana',
                        division: this.division,
                        district: this.district,
                    }
                }).then(function(response) {
                    this.thanas = response.data.data;
                }.bind(this));
            },
            getUnionss: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'union',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                    }
                }).then(function(response) {
                    this.unions = response.data.data;
                }.bind(this));
            },
            getPostoffices: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'postoffice',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                    }
                }).then(function(response) {
                    this.postoffices = response.data.data;

                    // console.log(response);
                }.bind(this));
            },
            getPostcodes: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'postcode',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                        postoffice: this.postoffice,
                    }
                }).then(function(response) {
                    this.postcodes = response.data.data;

                    // console.log(response);
                }.bind(this));
            },
            getVillages: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'village',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                        postoffice: this.postoffice,
                        postcode: this.postcode,
                    }
                }).then(function(response) {
                    this.villages = response.data.data;

                    // console.log(response);
                }.bind(this));
            },
            getWards: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'ward',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                        postoffice: this.postoffice,
                        postcode: this.postcode,
                        village: this.village,
                    }
                }).then(function(response) {
                    this.wards = response.data.data;

                    // console.log(response);
                }.bind(this));
            },
            getUnionToWard: function() {
                axios.get("{{route('direction.find')}}", {
                    params: {
                        column: 'union-ward',
                        division: this.division,
                        district: this.district,
                        thana: this.thana,
                        union: this.union,
                        postoffice: this.postoffice,
                        postcode: this.postcode,
                        village: this.village,
                    }
                }).then(function(response) {
                    this.unions = response.data.data.union;
                    this.postoffices = response.data.data.postoffice;
                    this.postcodes = response.data.data.postcode;
                    this.villages = response.data.data.village;
                    this.wards = response.data.data.ward;


                    // console.log(response);
                }.bind(this));
            }
        },
        created: function() {
            this.getDivision();
            this.getDistricts();
            this.getThanas();
            this.getUnionss();
            this.getPostoffices();
            this.getPostcodes();
            this.getVillages();
            this.getWards();
            this.getUnionToWard();


        }

    });
    Vue.config.devtools = true
</script>

@endsection
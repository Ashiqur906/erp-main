@extends('layouts.app')

@section('title', ' ঠিকানা ')
@section('sub_title', ' ')
@section('content')


<section class="content">
    <div class="row">
        <div class="col-md-12">


            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">নতুন প্রতিষ্ঠান যুক্ত করুন</h3>
                </div>
                <!-- /.box-header -->
                {{ Form::open(array('route' => 'direction.store', 'method' => 'post')) }}
                {{ Form::hidden('id', (!empty($id) ? $id : NULL), []) }}

                <div class="box-body">

                    <div class="panel panel-default">
                        <div class="panel-heading">প্রতিষ্ঠানের ঠিকানাঃ </div>
                        <div class="panel-body" id="my-app">


                            <div class="row">


                                <div class="col-md-3">

                                    <div class="form-group {{ ($errors->has('division'))? 'has-error' : '' }}">
                                        {{ Form::label('division', ' Division ', array('class' => 'division')) }}

                                        {{ Form::select('division',  get_direction_by("division"),
                                         (!empty($fdata->division) ? $fdata->division : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--division--']) }}
                                        @if($errors->has('division'))
                                        <span class="help-block">{{ $errors->first('division') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">


                                    <div class="form-group {{ ($errors->has('district'))? 'has-error' : '' }}">
                                        {{ Form::label('district', ' District ', array('class' => 'district')) }}

                                        {{ Form::select('district',  get_direction_by("district"),
                                         (!empty($fdata->district) ? $fdata->district : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--district--']) }}

                                        @if($errors->has('district'))
                                        <span class="help-block">{{ $errors->first('district') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('thana'))? 'has-error' : '' }}">
                                        {{ Form::label('thana', ' Thana ', array('class' => 'thana')) }}


                                        {{ Form::select('thana',  get_direction_by("thana"),
                                         (!empty($fdata->thana) ? $fdata->thana : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--thana--']) }}

                                        @if($errors->has('thana'))
                                        <span class="help-block">{{ $errors->first('thana') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('union'))? 'has-error' : '' }}">
                                        {{ Form::label('union', ' Union ', array('class' => 'union')) }}


                                        {{ Form::select('union',  get_direction_by("union"),
                                         (!empty($fdata->union) ? $fdata->union : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--union--']) }}

                                        @if($errors->has('union'))
                                        <span class="help-block">{{ $errors->first('union') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('postoffice'))? 'has-error' : '' }}">
                                        {{ Form::label('postoffice', ' postoffice ', array('class' => 'postoffice')) }}

                                        {{ Form::select('postoffice',  get_direction_by("postoffice"),
                                         (!empty($fdata->postoffice) ? $fdata->postoffice : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--postoffice--']) }}

                                        @if($errors->has('postoffice'))
                                        <span class="help-block">{{ $errors->first('postoffice') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('postcode'))? 'has-error' : '' }}">
                                        {{ Form::label('postcode', ' Postcode  ', array('class' => 'postcode')) }}

                                        {{ Form::select('postcode',  get_direction_by("postcode"),
                                         (!empty($fdata->postcode) ? $fdata->postcode : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--postcode--']) }}

                                        @if($errors->has('postcode'))
                                        <span class="help-block">{{ $errors->first('postcode') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('village'))? 'has-error' : '' }}">
                                        {{ Form::label('village', ' Village ', array('class' => 'village')) }}

                                        {{ Form::select('village',  get_direction_by("village"),
                                         (!empty($fdata->village) ? $fdata->village : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--village--']) }}

                                        @if($errors->has('village'))
                                        <span class="help-block">{{ $errors->first('village') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('ward'))? 'has-error' : '' }}">
                                        {{ Form::label('ward', ' ward ', array('class' => 'ward')) }}

                                        {{ Form::select('ward',  get_direction_by("ward"),
                                         (!empty($fdata->ward) ? $fdata->ward : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--ward--']) }}

                                        @if($errors->has('ward'))
                                        <span class="help-block">{{ $errors->first('ward') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group {{ ($errors->has('para'))? 'has-error' : '' }}">
                                        {{ Form::label('para', ' Para ', array('class' => 'para')) }}

                                        {{ Form::select('para',  get_direction_by("para"),
                                         (!empty($fdata->para) ? $fdata->para : NULL),
                                        ['class' => 'form-control dynamic-option','placeholder' => '--para--']) }}

                                        @if($errors->has('para'))
                                        <span class="help-block">{{ $errors->first('para') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <input class="btn btn-success" type="submit" value="Save Changes">
                    </div>
                    {{ Form::close() }}
                </div>
            </div>



        </div>



    </div>
    <!-- /.row -->

    <div class="modal fade" id="ProjectAjaxModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background:#00a7d0 !important; color: #fff">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#fff; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="pamTitle">Modal title</h4>
                </div>
                {{ Form::open(['route' => 'project.option']) }}
                <div class="modal-body">
                    <div id="pamModelData">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                {{ Form::close() }}


            </div>
        </div>
    </div>

</section>
@endsection


@section('cusjs')
<script>
    var myapp = new Vue({
        el: "#my-app",
        data: {

            division: 0,
            divisions: [],
            district: 0,
            districts: [],
            thana: 0,
            thanas: [],
            postoffice: 0,
            postcode: 0,
            village: 0,
            ward: 0,
            para: 0,
            address: []


        },
        methods: {
            getDivision: function() {
                axios.get("{{route('project.address')}}", {
                    params: {
                        column: 'division'
                    }
                }).then(function(response) {
                    this.divisions = response.data.data;
                }.bind(this));

            },
            getDistricts: function() {
                axios.get("{{route('project.address')}}", {
                    params: {
                        column: 'district'
                    }
                }).then(function(response) {
                    this.districts = response.data.data;
                }.bind(this));
            },
            getThanas: function() {
                axios.get("{{route('project.address')}}", {
                    params: {
                        column: 'thana',
                        division: this.division,
                        district: this.district,
                    }
                }).then(function(response) {
                    this.thanas = response.data.data;
                }.bind(this));
            },
            getPostoffices: function() {
                axios.get("{{route('project.address')}}", {
                    params: {
                        column: 'postoffice',
                        district: this.district,
                        thana: this.thana,
                    }
                }).then(function(response) {
                    this.address = response.data.data;

                    console.log(response);
                }.bind(this));
            }
        },
        created: function() {
            // this.getDivision();
            // this.getDistricts();
            // this.getThanas();
            // this.getPostoffices();
        }

    });
    Vue.config.devtools = true
</script>
</script>
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
</style>

<script>
    jQuery(".dynamic-option").select2({
        tags: true
    });
</script>



@endsection
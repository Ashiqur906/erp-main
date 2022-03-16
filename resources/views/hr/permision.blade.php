@extends('layouts.master')
@section('title', ' Role Permission')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            <b>{{$fdata->name}} :</b> Permission Assigned
                        </h3>



                    </div>

                    <div class="card-body">
                        <div id="ajaxLoadOne">
                            <table id="DatatableDocument" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">ID</th>
                                        <th>Name</th>

                                        <th style="width: 150px; text-align:center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($fdata->permissions) > 0)
                                    @foreach($fdata->permissions as $key => $data)


                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>

                                        <td class="text-right">
                                            <div class="btn-group btn-group-sm">



                                                <button type="submit" class="btn btn-danger " data-route="{{route('admin.hr.role.permission.assaing')}}" data-type="Remove" data-role="{{$fdata->id}}" data-permission="{{$data->id}}" ondblclick="assaignPermission(this);"><i class="material-icons">delete_forever</i></button>

                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- /.card -->


            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-success" data-route="{{route('admin.hr.permission.ajax')}}" data-mode="Add" onclick="showModel(this);">

                            <span class="material-icons">add</span> Add Role
                        </button>
                    </div>

                    <div class="card-body">
                        <div id="ajaxLoadTwo">
                            <table id="DatatableDocument" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 50px">Assign</th>
                                        <th style="width: 20px">ID</th>
                                        <th>Name</th>

                                        <th style="width: 150px; text-align:center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($mdata)
                                    @foreach($mdata as $key => $data)


                                    <tr>
                                        <td>
                                            @if(!$fdata->hasPermissionTo($data->name))
                                            <button class="btn btn-success btn-sm" data-route="{{route('admin.hr.role.permission.assaing')}}" data-type="Add" data-role="{{$fdata->id}}" data-permission="{{$data->id}}" ondblclick="assaignPermission(this);">
                                                <span class="material-icons">add_box</span>
                                            </button>
                                            @else
                                            <button class="btn btn-secondary disabled btn-sm">
                                                <span class="material-icons">add_box</span>
                                            </button>
                                            @endif

                                        </td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->name}}</td>




                                        <td class="text-right">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>
                                                <button data-route="{{route('admin.hr.permission.ajax', $data->id)}}" data-mode="Edit" onclick="showModel(this);" class="btn btn-warning btn-flat">
                                                    <i class="material-icons">create</i>
                                                </button>

                                                {{ Form::open(['method' => 'DELETE', 'route'=>['document.delete', $data->id]]) }}

                                                <button type="submit" class="btn btn-danger  btn-flat"><i class="material-icons">delete_forever</i></button>
                                                {{ Form::close() }}
                                            </div>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
                <!-- /.card -->


            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->


    <div class="modal fade" id="modalAjax">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{ Form::open(['method' => 'POST', 'route'=>'admin.hr.permision.save']) }}

                <div class="modal-body" id="modelAjaxView">

                </div>
                <div class="modal-footer justify-content-between">

                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                {{ Form::close() }}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</section>



<!-- ./wrapper -->
@endsection

@section('cusjs')
<style>

</style>


<script>
    function showModel(self) {
        let route = $(self).data('route');
        $.ajax({
            url: route,
            method: 'get',
            success: function(data) {
                //console.log(data);
                if (data.pass == "Yes") {
                    $('#modelAjaxView').html(data.data);
                    $('#modalAjax').modal('show');
                } else {
                    alert('There are somethings problem!');
                }

            },
            error: function() {}
        });
        //alert(route);
    }

    function assaignPermission(self) {
        let route = $(self).data('route');
        let data = {
            "_token": "{{ csrf_token() }}",
            role: $(self).data('role'),
            permission: $(self).data('permission'),
            type: $(self).data('type'),
        }
        $.ajax({
            url: route,
            method: 'post',
            data: data,
            success: function(data) {
                console.log(data);
                if (data.pass == "Yes") {
                    $("#ajaxLoadOne").load(" #ajaxLoadOne");
                    $("#ajaxLoadTwo").load(" #ajaxLoadTwo");
                } else {

                }

            },
            error: function() {}
        });

    }
</script>


@endsection
@extends('layouts.master')
@section('title', ' Roles')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-sm btn-success" data-route="{{route('admin.hr.role.ajax')}}" data-mode="Add" onclick="showModel(this);">

                            <span class="material-icons">add</span> Add Role
                        </button>
                    </div>

                    <div class="card-body">

                        <table id="DatatableDocument" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Name</th>
                                    <th>Permission</th>


                                    <th style="width: 150px; text-align:center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($mdata)
                                @foreach($mdata as $key => $data)


                                <tr>
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>

                                    <td>
                                        <a href="{{route('admin.hr.role.permision', $data->id)}}" class="btn btn-success btn-sm">Assign</a>
                                    </td>


                                    <td class="text-right">
                                        <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>
                                            <button data-route="{{route('admin.hr.role.ajax', $data->id)}}" data-mode="Edit" onclick="showModel(this);" class="btn btn-warning btn-flat">
                                                <i class="material-icons">create</i>
                                            </button>

                                            {{ Form::open(['method' => 'DELETE', 'route'=>['document.delete', $data->id]]) }}

                                            <button type="submit" class="btn btn-danger btn-flat"><i class="material-icons">delete_forever</i></button>
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
                {{ Form::open(['method' => 'POST', 'route'=>'admin.hr.role.save']) }}

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
</script>


@endsection
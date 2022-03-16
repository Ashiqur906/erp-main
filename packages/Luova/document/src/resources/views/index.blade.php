@extends('layouts.master')

@section('title', 'Document')
@section('sub_title', ' ')
@section('content')
<section class="content">


    <div class="row">

        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Document</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">

                    <table id="DatatableDocument" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>File one</th>
                                <th>File two</th>
                                <th>File three</th>

                                <th>Remarks</th>

                                <th>Status</th>

                                <th style="width: 150px; text-align:center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($mdata)
                            @foreach($mdata as $key => $data)


                            <tr>
                                <td>1.</td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->type}}</td>

                                <td>
                                    {!! lv_document_file($data->file_one) !!}
                                </td>
                                <td>
                                    {!! lv_document_file($data->file_two) !!}
                                </td>
                                <td>
                                    <img src="{{$data->file_three}}" style="height: 80px;" />
                                </td>

                                <td>{{$data->remarks}}</td>

                                <td>{{($data->is_active == 'Yes')? 'Active': 'Inactiv'}}</td>


                                <td class="text-right">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-secondary btn-flat"><i class="material-icons">info</i></button>
                                        <a href="{{route('document.edit',$data->id )}}" class="btn btn-warning btn-flat">
                                            <i class="material-icons">create</i>
                                        </a>
                                        <!-- <button type="button" class="btn btn-success btn-flat"><i class="material-icons">visibility</i></button> -->

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
                <!-- /.card-body -->

                <div class="card-footer clearfix">
                    {{ $mdata->links() }}
                </div>

            </div>
        </div>





    </div>
    <!-- /.row -->


</section>
@endsection


@section('cusjs')
<style>

</style>


<script>

</script>


@endsection
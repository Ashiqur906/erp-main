@extends('layouts.master')
@section('title', ' Categories')
@section('content')


<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-5">
                {{ Form::open(['method' => 'POST', 'route'=>'category.store']) }}
                <div class="card  {{(!empty($fdata) ?'card-warning' : 'card-primary')}}">
                    <div class="card-header">
                        <h3 class="card-title mb-0">
                            {{(!empty($fdata) ?'Edit' : 'Add New')}} Category
                        </h3>
                    </div>
                    {{ Form::hidden('id', (!empty($fdata->id) ? $fdata->id : NULL) ) }}
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('title', 'Title')}}
                            {{ Form::text('title', (!empty($fdata->title) ? $fdata->title : NULL), ['id' => 'title','class' => ($errors->has('title')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Title' ]) }}
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            {{ Form::label('remarks', 'Remarks')}}
                            {{ Form::text('remarks', (!empty($fdata->remarks)? $fdata->remarks: NULL), ['class' => ($errors->has('remarks')? 'form-control is-invalid': 'form-control'), 'placeholder' => 'Remarks' ]) }}
                            @error('remarks')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>


                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                {{ Form::checkbox('is_active', 'Yes', false, [
                                    'class' => 'custom-control-input', 
                                    'id' => 'is_active', 
                                    'checked' => ((!empty($fdata->is_active) && $fdata->is_active == 'Yes')? true: false)
                                    ])}}
                                <label class="custom-control-label" for="is_active"> Is Active ?</label>
                            </div>
                        </div>



                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('category.all')}}" class="btn btn-sm btn-success">
                            <span class="material-icons">add_circle_outline</span> Category
                        </a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-bordered" id="user_table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th style="width: 185px; text-align:center">Actions</th>

                                </tr>
                            </thead>

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
        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel', 'pdf', 'print'
            ],
            ajax: {
                url: "{{ route('category.all') }}",
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                }, {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]

        });

    });
</script>


@endpush
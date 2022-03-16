@extends('layouts.master')
@section('title', ' Users')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <a href="{{route('admin.hr.user.edit', $mdata->id)}}" class="btn btn-sm btn-success">
                            <span class="material-icons">edit</span> Edit Profile
                        </a>
                    </div>

                    <div class="card-body">
                        Name
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
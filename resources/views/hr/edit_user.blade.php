@extends('layouts.master')
@section('title', ' Users')
@section('content')




<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
            <div class="col-md-12">

                <div class="card card-secondary card-tabs">

                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-basic-tab" data-toggle="pill"
                                    href="#custom-tabs-one-basic" role="tab" aria-controls="custom-tabs-one-home"
                                    aria-selected="true">Basic Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-inportant-tab" data-toggle="pill"
                                    href="#custom-tabs-one-inportant" role="tab" aria-controls="custom-tabs-one-profile"
                                    aria-selected="false">Important Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-address-tab" data-toggle="pill"
                                    href="#custom-tabs-one-address" role="tab" aria-controls="custom-tabs-one-messages"
                                    aria-selected="false">Address</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-job-tab" data-toggle="pill"
                                    href="#custom-tabs-one-job" role="tab" aria-controls="custom-tabs-one-settings"
                                    aria-selected="false">Job Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-doc-tab" data-toggle="pill"
                                    href="#custom-tabs-one-doc" role="tab" aria-controls="custom-tabs-one-settings"
                                    aria-selected="false">Job Information</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-one-basic" role="tabpanel"
                                aria-labelledby="custom-tabs-one-basic-tab">
                                @include('hr.user_part.basic', ['fdata' => $fdata])

                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-inportant" role="tabpanel"
                                aria-labelledby="custom-tabs-one-inportant-tab">
                                @include('hr.user_part.inportant', ['fdata' => $fdata])
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-address" role="tabpanel"
                                aria-labelledby="custom-tabs-one-address-tab">
                                @include('hr.user_part.address', ['address' => $address, 'fuser' => $fdata->id])
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-job" role="tabpanel"
                                aria-labelledby="custom-tabs-one-job-tab">
                                Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus
                                turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis
                                vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum
                                pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget
                                aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac
                                habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-one-doc" role="tabpanel"
                                aria-labelledby="custom-tabs-one-doc-tab">
                                <media-modal>
                                </media-modal>

                            </div>
                        </div>
                    </div>


                    <!-- /.card -->
                </div>


            </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
</section>



<!-- ./wrapper -->
@endsection
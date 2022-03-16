@extends('frontend.layouts.master')

@section('content')
<section class="container-fluid">
    <div class="container">
        <div class="row mainbody">
            <div class="col-md-9">
                <div class="owl-carousel  mt-3">
                    <div> <img src="{{asset('frontend/images/slider/01.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/02.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/03.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/04.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/05.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/06.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/07.jpg')}}"> </div>
                    <div> <img src="{{asset('frontend/images/slider/08.jpg')}}"> </div>


                </div>
                <div class="row">

                    <div class="col-md-12">
                        <h2 class="section-header"> Notice Board</h2>
                    </div>
                    <div class="col-md-12">
                        <div class="notice_haf">
                            <div class="notice-one"
                                style="background:url(https://www.riverpolice.gov.bd/wp-content/uploads/2019/09/notice.png) no-repeat">
                                <!--<div class="notice-caption">-->
                                <!--  <h3>নোটিশ বোর্ড</h3>-->
                                <!--</div>-->
                                <div class="notice-list" id="example2">
                                    <ul class="list-unstyled">


                                        <li><a href="https://www.riverpolice.gov.bd/%e0%a6%8f%e0%a6%8f%e0%a6%b8%e0%a6%86%e0%a6%87-%e0%a6%a8%e0%a6%bf%e0%a6%b0%e0%a6%b8%e0%a7%8d%e0%a6%a4%e0%a7%8d%e0%a6%b0-%e0%a6%9c%e0%a6%a8%e0%a6%be%e0%a6%ac-%e0%a6%ae%e0%a7%8b%e0%a6%83-%e0%a6%b0/"
                                                rel="bookmark"
                                                title="এএসআই (নিরস্ত্র) জনাব মোঃ রেজোয়ান দেওয়ান এর বিভাগীয় অনাপত্তিপত্র">
                                                এএসআই (নিরস্ত্র) জনাব মোঃ রেজোয়ান দেওয়ান এর বিভাগীয় অনাপত্তিপত্র</a>
                                        </li>

                                        <li><a href="https://www.riverpolice.gov.bd/%e0%a6%a8%e0%a7%8c-%e0%a6%aa%e0%a7%81%e0%a6%b2%e0%a6%bf%e0%a6%b6%e0%a7%87%e0%a6%b0-%e0%a6%89%e0%a6%a8%e0%a7%8d%e0%a6%ae%e0%a7%81%e0%a6%95%e0%a7%8d%e0%a6%a4-%e0%a6%a6%e0%a6%b0%e0%a6%aa%e0%a6%a4/"
                                                rel="bookmark" title="নৌ পুলিশের উন্মুক্ত দরপত্র বিজ্ঞপ্তি">
                                                নৌ পুলিশের উন্মুক্ত দরপত্র বিজ্ঞপ্তি</a>
                                        </li>

                                        <li><a href="https://www.riverpolice.gov.bd/annual-procurement-plan-of-computers-and-accessories-for-river-police-2020-2021/"
                                                rel="bookmark" title="ANNUAL PROCUREMENT PLAN 2020-2021">
                                                ANNUAL PROCUREMENT PLAN 2020-2021</a>
                                        </li>

                                        <li><a href="https://www.riverpolice.gov.bd/%e0%a6%89%e0%a6%a8%e0%a7%8d%e0%a6%ae%e0%a7%81%e0%a6%95%e0%a7%8d%e0%a6%a4-%e0%a6%a6%e0%a6%b0%e0%a6%aa%e0%a6%a4%e0%a7%8d%e0%a6%b0-%e0%a6%ac%e0%a6%bf%e0%a6%9c%e0%a7%8d%e0%a6%9e%e0%a6%aa%e0%a7%8d-4041/"
                                                rel="bookmark"
                                                title="উন্মুক্ত দরপত্র বিজ্ঞপ্তি, নৌ পুলিশ স্মারক নং- নৌ/টেন্ডার-১১৬১/২০২০/৪০১৪">
                                                উন্মুক্ত দরপত্র বিজ্ঞপ্তি, নৌ পুলিশ স্মারক নং-
                                                নৌ/টেন্ডার-১১৬১/২০২০/৪০১৪</a>
                                        </li>

                                        <li><a href="https://www.riverpolice.gov.bd/tender_2020-3635/" rel="bookmark"
                                                title="উন্মুক্ত দরপত্র বিজ্ঞপ্তি, নৌ পুলিশ স্মারক নং- নৌ/টেন্ডার/২০২০/৩৬৩৫">
                                                উন্মুক্ত দরপত্র বিজ্ঞপ্তি, নৌ পুলিশ স্মারক নং- নৌ/টেন্ডার/২০২০/৩৬৩৫</a>
                                        </li>

                                    </ul>
                                </div>








                                <div class="notice-btn">
                                    <a class="" href="?page_id=1359">All</a> </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="row">

                    <div class="col-md-12">
                        <h2 class="section-header"> Photo Gallery </h2>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/01.jpg')}}">
                                <img src="{{asset('frontend/images/slider/01.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/02.jpg')}}">
                                <img src="{{asset('frontend/images/slider/02.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/03.jpg')}}">
                                <img src="{{asset('frontend/images/slider/03.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/04.jpg')}}">
                                <img src="{{asset('frontend/images/slider/04.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/05.jpg')}}">
                                <img src="{{asset('frontend/images/slider/05.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="img-gallery">
                            <a data-lightbox="example-set" href="{{asset('frontend/images/slider/06.jpg')}}">
                                <img src="{{asset('frontend/images/slider/06.jpg')}}">
                            </a>
                        </div>
                        <div class="title-gallery">
                            <a href="#"> DIG River Police en →</a>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="section-footer">
                            <a href="?page_id=1492"> More Photo <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">
                        <h2 class="section-header"> Video Gallery </h2>
                    </div>
                    <div class="col-md-12">
                        <div class="videoGallery gap">
                            <div class="header_video">
                                <!-- THE YOUTUBE PLAYER -->

                                <div class="vid-container gap">
                                    <iframe width="98%" height="400px" frameborder="0"
                                        src="https://www.youtube.com/embed/bxWRglJFQNc" id="vid_frame"></iframe>
                                </div>

                                <!-- THE PLAYLIST -->
                                <div class="vid-list-container">

                                    <div class="vid-list">

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/bxWRglJFQNc'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/06/National-Portal-Card-PM.jpeg">
                                            </div>
                                            <div class="desc">করোনাভাইরাস মোকাবিলায় মাননীয় প্রধানমন্ত্রীর ৩১ নির্দেশনা
                                            </div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/Egh-L38YRXQ'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/06/rp_corona22.jpg">
                                            </div>
                                            <div class="desc">operation sea</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/Egh-L38YRXQ'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/06/rp_corona22.jpg">
                                            </div>
                                            <div class="desc">করোনা প্রতিরোধে নৌ পুলিশ ভূমিকা</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/FpeDi7jlxic'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/02/padma-meghna-hilsha.jpg">
                                            </div>
                                            <div class="desc">জাটকা ও পোনা মাছ সংরক্ষণে চাঁদপুররে পদ্মা-মঘেনা নদীতে
                                                অভযিান
                                                চালাচ্ছে ভ্রাম্যমাণ আদালত</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/u9ZbN7WZFso'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2020/01/elish1111.jpg">
                                            </div>
                                            <div class="desc">ইলিশ ধরার উপর নিষেধাজ্ঞা তুলে নেওয়া হবে ৩১ অক্টোবর</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/T-wSn4L9G6Q'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2019/12/dig_atiq1005.jpg">
                                            </div>
                                            <div class="desc">শেষ দিনেও কড়া পাহারা নৌ পুলিশের</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/kvdsC9GzT2o'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2019/12/logo.png">
                                            </div>
                                            <div class="desc">বাংলাদেশ নৌ পুলিশ তথ্যচিত্র River Police Documentary</div>
                                        </div>

                                        <div onclick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/6rMVDD-VWkU'"
                                            class="vid-item">
                                            <div class="thumb"><img
                                                    src="https://www.riverpolice.gov.bd/wp-content/uploads/2019/12/mqdefault.jpg">
                                            </div>
                                            <div class="desc">BANGLADESH POLICE ACADEMY বাংলাদেশ পুলিশ একাডেমী</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="section-footer">
                            <a href="?page_id=1492"> More Photo <i class="fa fa-long-arrow-right"></i> </a>
                        </div>
                    </div>
                </div>









            </div>
            <div class="col-md-3">
                @include('frontend.layouts.essential.side_bar')


            </div>

        </div>




    </div>
</section>
<!-- ./wrapper -->
@endsection

@push('scripts')




@endpush
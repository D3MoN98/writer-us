@extends('layout.app')

@section('content')
<!--Bnr Start-->
<section class="banner_sec inner_ban">
    <div class="bnr_otr">
        <div class="bnr_img_otr">
            <div class="bnr_pic zoom_otr"><img src="{{asset('images/about_ban.jpg')}}" class="zoom"></div>
        </div>
        <div class="bnr_content text-left">
            <div class="container">
                <div class="wow fadeInLeft">
                    <h1>Top Essay Writers
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Bnr End-->
<section class="our_time_sec hww-sec">
    <div class="our_time_area">
        <div class="container">
            <div class="cmn_hdr text-center wow fadeInLeft ">
                <h2>Top Essay Writers</h2>
                <div class="mul_p">
                    <p>Review the impressive credentials of the writers in our service, such as awards, ratings,
                        customer's feedback and
                        select the one who best suits your assignment.
                    </p>
                </div>
            </div>
            <div class="writter_pg row">
                @if ($writers->count() > 0)
                @foreach ($writers as $writer)
                <div class="col-md-4">
                    <div class="testimonial-box writer_pg_bx  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="testi-icon">
                            <div class="testi-icon-innr"> <img src="{{asset("storage/$writer->image")}}" alt="" />
                            </div>
                            <div class="testi-icon-txt">
                                <h3>{{$writer->name}}</h3>
                                <h5>№{{$writer->global_rating_rank}} In global rating</h5>
                                <img src="{{asset('images/star.png')}}" alt="">
                            </div>
                        </div>
                        <div class="chs-txt">
                            <div>
                                <h2>{{$writer->finished_papers}}</h2>
                                <p>Finished Papers</p>
                            </div>
                            <div>
                                <h2>{{$writer->customer_reviews}}</h2>
                                <p>Customer Reviews</p>
                            </div>
                        </div>
                        <div class="hire-txt">
                            <div>
                                <h2>{{$writer->success_rate}}%</h2>
                                <p>Success Rate</p>
                            </div>
                            <a href="" class="btn btn-primary cmn_btn ">Hire</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                @if ($writers->count() == 0)
                No writer available
                @endif
            </div>
        </div>
    </div>
</section>
<!-- end section  -->
<!-- contact section   -->
<section class="contus-sec">
    <div class="container">
        <div class="contus-otr">
            <div class="cmn_hdr mid text-center   wow fadeInLeft ">
                <h2>Place Your Order Now!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus</p>
            </div>
            <div class="contus-in">
                <div class="hdr-btn"> <a href="" class="btn btn-primary cmn_btn ">log in</a> <a href=""
                        class="btn btn-primary cmn_btn lg-in">hire writer</a> </div>
            </div>
        </div>
    </div>
</section>
<!--       -->
@endsection

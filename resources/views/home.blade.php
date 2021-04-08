@extends('layout.app')

@section('content')
<!--Header End-->
<!--Bnr Start-->
<section class="banner_sec">
    <div class="bnr_otr">
        <div class="bnr_img_otr">
            <div class="bnr_pic zoom_otr"><img src="{{asset('images/bnr.jpg')}}" class="zoom"></div>
        </div>
        <div class="bnr_content text-left">
            <div class="container">
                <div class="wow fadeInLeft">
                    <h1>Professional Writing Service At Affordable Price
                    </h1>
                    <div class="bnr-btn"> <a href="" class="btn btn-primary cmn_btn bn-btn">Get Content Now!</a> </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Bnr End-->
<section class="our_time_sec hww-sec">
    <div class="our_time_area">
        <div class="container">
            <div class="cmn_hdr text-center   wow fadeInLeft ">
                <h2>How it Works WritersUs ?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus euismod
                    <br> tempus ligula, id pretium dolor molestie vel.
                </p>
            </div>
            <div class="pnt_req-otr">
                <div class="row">
                    <div class="col-lg-4 col-md-6 hwtt">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="img_ar hover_scale"> <span>1</span> </div>
                                <div class="grn-pic-txt">
                                    <h3>Place Orders with Our<br>Simple Interface</h3>
                                    <p> Our one-page order form asks you a few simple, but essential questions about
                                        your content requirements. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 hwtt">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow fadeInLeft" data-wow-delay="0.3s">
                                <div class="img_ar-in">
                                    <div class="img_ar hover_scale"> <span>2</span> </div>
                                </div>
                            </div>
                            <div class="grn-pic-txt">
                                <h3>Qualified Writers Create<br>Your Content</h3>
                                <p>A qualified writer will claim your order and write your content based on your
                                    guidelines. Use instant chat. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 hwtt">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow fadeInLeft" data-wow-delay="0.4s">
                                <div class="img_ar-in">
                                    <div class="img_ar hover_scale"> <span>3</span> </div>
                                </div>
                            </div>
                            <div class="grn-pic-txt">
                                <h3>Engage your Audience and<br>Increase search Traffic</h3>
                                <p> Publish amazing content that engages your target audience. Word of mouth, social
                                    shares, and organic search traffic together grow your customer base. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="offr-sec ">
    <div class="container">
        <div class="offr-outr">
            <div class="row">
                <div class="col-md-6 offr-in oft">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="cmn_hdr text-left">
                            <h5>how to get started</h5>
                            <h2>Tap into the world’s <br>largest talent network </h2>
                        </div>
                        <div class="tap-text text-left">
                            <h3>Find and hire speciaized talent.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis porttitor quam,
                                in scelerisque mauris pulvinar et. Nam congue diam congue, interdum augue vel, eleifend
                                orci. Orci varius natoque penatibus et magnis dis parturient montes,</p>
                            <a href="" class="btn btn-primary cmn_btn bn-btn">Get Content Now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offr-in ">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="offr-pic commn-scale"> <img src="{{asset('images/tap-txt.jpg')}}" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="our_time_sec">
    <div class="our_time_area">
        <div class="container">
            <div class="cmn_hdr text-center wht  wow fadeInLeft ">
                <h2>What’s included?</h2>
            </div>
            <div class="pnt_req-otr">
                <div class="row">
                    <div class="col-lg-3 col-md-6 gap">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow pulse" data-wow-delay="">
                                <div class="img_ar hover_scale"> <img src="{{asset('images/our1.png')}}"> </div>
                                <div class="grn-pic-txt">
                                    <h3>Customer Satisfaction<br>Guaranteed</h3>
                                    <p> Only pay after getting the perfect paper. No revision limits. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 gap">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow pulse" data-wow-delay="">
                                <div class="img_ar-in">
                                    <div class="img_ar hover_scale"> <img src="{{asset('images/our2.png')}}"> </div>
                                </div>
                                <div class="grn-pic-txt">
                                    <h3>Quick Results</h3>
                                    <p> Meet any deadline. 450 dedicated writers are ready to complete your essay in as
                                        quickly as 3 hours. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 gap">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow pulse" data-wow-delay="">
                                <div class="img_ar-in">
                                    <div class="img_ar hover_scale"> <img src="{{asset('images/our3.png')}}"> </div>
                                </div>
                                <div class="grn-pic-txt">
                                    <h3>24/7 Unlimited<br>Support</h3>
                                    <p> We’re always there for you and respond in as little as one minute. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 gap">
                        <div class="pen_box_area ">
                            <div class="pen_box_area-in wow pulse" data-wow-delay="">
                                <div class="img_ar-in">
                                    <div class="img_ar hover_scale"> <img src="{{asset('images/our4.png')}}"> </div>
                                </div>
                                <div class="grn-pic-txt">
                                    <h3>All papers double-<br>checked</h3>
                                    <p>First we check the web. Secondly, we check our own database of completed orders.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="case-sec choose-sec">
    <div class="container">
        <div class="case-otr">
            <div class="cmn_hdr text-center mid  wow fadeInLeft ">
                <h2>Choose Your Writer</h2>
            </div>
            <div class="testimonial-outr">
                <div class="thrpy-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-box  wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/ch1.png')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>Dr. Raychelle</h3>
                                        <h5>№5 In global rating</h5>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="chs-txt">
                                    <div>
                                        <h2>107</h2>
                                        <p>Finished Papers</p>
                                    </div>
                                    <div>
                                        <h2>289</h2>
                                        <p>Customer Reviews</p>
                                    </div>
                                </div>
                                <div class="hire-txt">
                                    <div>
                                        <h2>99%</h2>
                                        <p>Success Rate</p>
                                    </div>
                                    <a href="" class="btn btn-primary cmn_btn ">Hire</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box  wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/ch2.png')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>Dr. Raychelle</h3>
                                        <h5>№5 In global rating</h5>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="chs-txt">
                                    <div>
                                        <h2>114</h2>
                                        <p>Finished Papers</p>
                                    </div>
                                    <div>
                                        <h2>305</h2>
                                        <p>Customer Reviews</p>
                                    </div>
                                </div>
                                <div class="hire-txt">
                                    <div>
                                        <h2>95%</h2>
                                        <p>Success Rate</p>
                                    </div>
                                    <a href="" class="btn btn-primary cmn_btn ">Hire </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box  wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/ch3.png')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>Dr. Raychelle</h3>
                                        <h5>№5 In global rating</h5>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="chs-txt">
                                    <div>
                                        <h2>185</h2>
                                        <p>Finished Papers</p>
                                    </div>
                                    <div>
                                        <h2>250</h2>
                                        <p>Customer Reviews</p>
                                    </div>
                                </div>
                                <div class="hire-txt">
                                    <div>
                                        <h2>97%</h2>
                                        <p>Success Rate</p>
                                    </div>
                                    <a href="" class="btn btn-primary cmn_btn ">Hire</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box  wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"><img src="{{asset('images/ch1.png')}}" alt="" /> </div>
                                    <div class="testi-icon-txt">
                                        <h3>Dr. Raychelle</h3>
                                        <h5>№5 In global rating</h5>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="chs-txt">
                                    <div>
                                        <h2>107</h2>
                                        <p>Finished Papers</p>
                                    </div>
                                    <div>
                                        <h2>289</h2>
                                        <p>Customer Reviews</p>
                                    </div>
                                </div>
                                <div class="hire-txt">
                                    <div>
                                        <h2>99%</h2>
                                        <p>Success Rate</p>
                                    </div>
                                    <a href="" class="btn btn-primary cmn_btn ">Hire</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"> </div>
                <div class="swiper-button-prev"> </div>
            </div>
        </div>
    </div>
</section>
<!--  testimonial section     -->
<section class="case-sec ">
    <div class="container">
        <div class="case-otr">
            <div class="cmn_hdr text-center mid  wow fadeInLeft ">
                <h2>What Our Customers Say </h2>
            </div>
            <div class="testimonial-outr">
                <div class="trends-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonial-box wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/bk1.jpg')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>@ writersus</h3>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="testi-txt">
                                    <p>I always come here whenever I feel overwhelmed with my assignments. They'll help
                                        you out at a reasonable price. Highly Recommended!!!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/bk2.jpg')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>@ writersus</h3>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="testi-txt">
                                    <p>I have been using Writer & US LLC for nearly two years now and my writer has
                                        provided top star quality. I highly recommend this site if you are in need of
                                        some five star service!!</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/bk3.jpg')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>@ writersus</h3>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="testi-txt">
                                    <p>I love this platform, I always get a good writer with fully understanding of my
                                        instruction, the website is user friendly.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="testimonial-box wow fadeInLeft" data-wow-delay="0.2s">
                                <div class="testi-icon">
                                    <div class="testi-icon-innr"> <img src="{{asset('images/bk1.jpg')}}" alt="" />
                                    </div>
                                    <div class="testi-icon-txt">
                                        <h3>@ writersus</h3>
                                        <img src="{{asset('images/star.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="testi-txt">
                                    <p>I always come here whenever I feel overwhelmed with my assignments. They'll help
                                        you out at a reasonable price. Highly Recommended!!!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
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

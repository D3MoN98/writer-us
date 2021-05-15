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
                    <h1>About Writers Us
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Bnr End-->
<section class="our_time_sec hww-sec abt_sec">
    <div class="our_time_area">
        <div class="container">
            <div class="cmn_hdr text-center   wow fadeInLeft ">
                <h2>About Us</h2>
                <div class="mul_p">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in justo scelerisque, scelerisque
                        nunc quis, placerat turpis. Pellentesque habitant morbi tristique senectus et netus et malesuada
                        fames ac turpis egestas. Aliquam erat volutpat. Proin vitae urna malesuada, pellentesque leo
                        vitae, iaculis nisl. Morbi sed nisl tortor. Cras suscipit dapibus nisi, eleifend blandit massa
                        convallis et. Integer interdum nisi nunc, a tempus augue faucibus sed. Ut quis facilisis nisi,
                        quis congue felis. </p>
                    <p>Quisque massa libero, vestibulum vitae tempor id, accumsan volutpat risus. Class aptent taciti
                        sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut fringilla turpis ac
                        leo iaculis facilisis vel at libero. Ut nec accumsan lorem. Curabitur sit amet arcu in eros
                        finibus commodo.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="offr-sec abt_pg_ofr">
    <div class="container">
        <div class="offr-outr">
            <div class="row align-items-center">
                <div class="col-md-6 offr-in oft">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="cmn_hdr text-left">
                            <h2>Tap into the world’s <br />
                                largest talent network
                            </h2>
                        </div>
                        <div class="tap-text text-left">
                            <h3>Find and hire speciaized talent.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis porttitor quam,
                                in scelerisque mauris pulvinar et. Nam congue diam congue, interdum augue vel, eleifend
                                orci. Orci varius natoque penatibus et magnis dis parturient montes,</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offr-in rrgg">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="offr-pic commn-scale"> <img src="{{asset('images/abt_pg1.jpg')}}" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="offr-outr">
            <div class="row align-items-center">
                <div class="col-md-6 offr-in oft rrgg">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="cmn_hdr text-left">
                            <h2>Tap into the world’s <br />
                                largest talent network
                            </h2>
                        </div>
                        <div class="tap-text text-left">
                            <h3>Find and hire speciaized talent.</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis facilisis porttitor quam,
                                in scelerisque mauris pulvinar et. Nam congue diam congue, interdum augue vel, eleifend
                                orci. Orci varius natoque penatibus et magnis dis parturient montes,</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 offr-in ">
                    <div class="offr-innr  wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="offr-pic commn-scale"> <img src="{{asset('images/abt_pg2.jpg')}}" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end section  -->
<!-- contact section   -->
<div class="contus-sec">
    <div class="container">
        <div class="contus-otr">
            <div class="cmn_hdr mid text-center   wow fadeInLeft ">
                <h2>Place Your Order Now!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc maximus</p>
            </div>
            <div class="contus-in">
                <div class="hdr-btn">
                    @guest
                    <a href="" class="btn btn-primary cmn_btn " data-toggle="modal" data-target="#loginModal">log in</a>
                    <a href="" class="btn btn-primary cmn_btn lg-in" data-toggle="modal" data-target="#loginModal">hire
                        writer</a>
                    @endguest

                    @auth
                    <a href="{{route('job.create')}}" class="btn btn-primary cmn_btn lg-in">hire
                        writer</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--       -->

@endsection

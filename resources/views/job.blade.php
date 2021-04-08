@extends('layout.app')

@section('content')
<!--Bnr Start-->
<section class="banner_sec">
    <div class="bnr_otr">
        <div class="bnr_img_otr">
            <div class="bnr_pic zoom_otr"><img src="{{asset('images/job-bnr.jpg')}}" class="zoom"></div>
        </div>
        <div class="bnr_content text-left">
            <div class="container">
                <div class="wow fadeInLeft">
                    <h1>Hire Writers
                    </h1>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Bnr End-->
<div class="thanku-sec">
    <div class="container ">
        <form id="multistepsform">
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Place Order</li>
                <li>Choose Your Writer</li>
                <li>Order Complete</li>
                <li> </li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <div class="row">
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Type of service</label>
                                <select>
                                    <option>united states</option>
                                    <option>united states</option>
                                    <option>united states</option>
                                    <option>united states</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deadline :</label>
                                <input type="date" class="form-control" placeholder="" required> </div>
                            <div class="form-group">
                                <label>Number of pages :</label>
                                <input type="number" class="form-control" placeholder=" ">
                                <label>275 words one page (double spaced)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Select your subject :</label>
                                <select>
                                    <option>Healthcare </option>
                                    <option>Healthcare </option>
                                    <option>Healthcare </option>
                                    <option>Healthcare </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>What is your topic? </label>
                                <textarea placeholder="Write about…"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Paper instructions :</label>
                                <textarea
                                    placeholder="Any special requirements? Give us the main idea of the paper and other details (e.g. citation formatting)"></textarea>
                            </div>
                            <div class="form-group">
                                <div class='file file--upload'>
                                    <input type="file" id="file-upload" placeholder="Upload now">
                                    <label for="file-upload"><em><img src="{{asset('images/plus.png')}}"
                                                alt=""></em><strong>Drop
                                            files here or<br>
                                            Click to upload</strong></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="next" class="next action-button" value="Choose Your Writer" />
            </fieldset>
            <fieldset>
                <div class="frm-slide case-sec choose-sec">
                    <h3 class="text-center">Find the best writer for your paper below.</h3>
                    <div class="testimonial-outr">
                        <div class="thrpy-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-box ">
                                        <div class="testi-icon">
                                            <div class="testi-icon-innr"> <img src="{{asset('images/ch1.png')}}"
                                                    alt="" /> </div>
                                            <div class="testi-icon-txt">
                                                <h3>Dr. Raychelle</h3>
                                                <h5>№5 In global rating</h5> <img src="{{asset('images/star.png')}}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="chs-txt">
                                            <div>
                                                <h2>$25.00</h2>
                                            </div>
                                        </div>
                                        <div class="hire-txt">
                                            <div>
                                                <h2>99%</h2>
                                                <p>Success Rate</p>
                                            </div> <a href="" class="btn btn-primary cmn_btn ">Accept</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box">
                                        <div class="testi-icon">
                                            <div class="testi-icon-innr"> <img src="{{asset('images/ch2.png')}}"
                                                    alt="" /> </div>
                                            <div class="testi-icon-txt">
                                                <h3>Dr. Raychelle</h3>
                                                <h5>№5 In global rating</h5> <img src="{{asset('images/star.png')}}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="chs-txt">
                                            <div>
                                                <h2>$25.00</h2>
                                            </div>
                                        </div>
                                        <div class="hire-txt">
                                            <div>
                                                <h2>95%</h2>
                                                <p>Success Rate</p>
                                            </div> <a href="" class="btn btn-primary cmn_btn ">Accept </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box ">
                                        <div class="testi-icon">
                                            <div class="testi-icon-innr"> <img src="{{asset('images/ch3.png')}}"
                                                    alt="" /> </div>
                                            <div class="testi-icon-txt">
                                                <h3>Dr. Raychelle</h3>
                                                <h5>№5 In global rating</h5> <img src="{{asset('images/star.png')}}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="chs-txt">
                                            <div>
                                                <h2>$25.00</h2>
                                            </div>
                                        </div>
                                        <div class="hire-txt">
                                            <div>
                                                <h2>97%</h2>
                                                <p>Success Rate</p>
                                            </div> <a href="" class="btn btn-primary cmn_btn ">Accept</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-box">
                                        <div class="testi-icon">
                                            <div class="testi-icon-innr"><img src="{{asset('images/ch1.png')}}"
                                                    alt="" /> </div>
                                            <div class="testi-icon-txt">
                                                <h3>Dr. Raychelle</h3>
                                                <h5>№5 In global rating</h5> <img src="{{asset('images/star.png')}}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="chs-txt">
                                            <div>
                                                <h2>$25.00</h2>
                                            </div>
                                        </div>
                                        <div class="hire-txt">
                                            <div>
                                                <h2>99%</h2>
                                                <p>Success Rate</p>
                                            </div> <a href="" class="btn btn-primary cmn_btn ">Accept</a>
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
                <input type="button" name="next" class="next action-button" value="Check your order" />
            </fieldset>
            <fieldset>
                <h3 class="text-center">Check your order and add funds to your balance</h3>
                <div class="ul-list">
                    <ul>
                        <li>
                            <div class="fld3">
                                <h5>Type of service :</h5> <span>Writing</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Select your subject :</h5> <span>Healthcare</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Type of service :</h5> <span>Writing</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Type of service :</h5> <span>Writing</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Type of service :</h5> <span>Writing</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-md-8 chk-in">
                        <div class="wrtr">
                            <h5>writer :</h5>
                            <div class="wrtr-in">
                                <div class="wrtr-img"> <img class="img-fluid" src="{{asset('images/.png')}}" alt="">
                                </div>
                                <div class="wrtr-txt">
                                    <h3>Dr. Raychelle</h3>
                                    <p>№5 In global rating</p>
                                </div>
                                <div class="wrtr-prc">
                                    <h3>$90</h3>
                                </div>
                            </div>
                        </div>
                        <div class="res-list">
                            <ul>
                                <li>
                                    <div class="fld3">
                                        <img src="{{asset('images/re1.png')}}" alt="">
                                        <p>100% refund guarantee</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="fld3">
                                        <img src="{{asset('images/re2.png')}}" alt="">
                                        <p>Privacy is <br>
                                            #1</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="fld3">
                                        <img src="{{asset('images/re3.png')}}" alt="">
                                        <p>Strict level of
                                            security</p>
                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="col-md-4 chk-in">
                        <div class="login-bg">
                            <div class="order or-sum">
                                <h3>Order Summary</h3>
                            </div>
                            <div class="order">
                                <div class="order-in">
                                    <h4>Paper price</h4>
                                    <h5>
                                        $28.00</h5>
                                </div> <span>1 page × $28.00</span>
                            </div>
                            <div class="order">
                                <div class="order-in">
                                    <h4>Total price</h4>
                                    <h5>$90</h5>
                                </div>
                                <br>
                                <p>The funds will be held in your account until you release them. </p>
                                <input type="submit" name="submit" class="submit action-button"
                                    value="Proceed to checkout" />
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
    var current_fs, next_fs, previous_fs;
	var left, opacity, scale;
	var animating;
	$(".next").click(function() {
		if(animating) return false;
		animating = true;
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();
		$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
		next_fs.show();
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				scale = 1 - (1 - now) * 0.2;
				left = now * 50 + "%";
				opacity = 1 - now;
				current_fs.css({
					transform: "scale(" + scale + ")",
					position: "absolute"
				});
				next_fs.css({
					left: left,
					opacity: opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},
			easing: "easeInOutBack"
		});
	});
	$(".previous").click(function() {
		if(animating) return false;
		animating = true;
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
		previous_fs.show();
		current_fs.animate({
			opacity: 0
		}, {
			step: function(now, mx) {
				scale = 0.8 + (1 - now) * 0.2;
				left = (1 - now) * 50 + "%";
				opacity = 1 - now;
				current_fs.css({
					left: left
				});
				previous_fs.css({
					transform: "scale(" + scale + ")",
					opacity: opacity
				});
			},
			duration: 800,
			complete: function() {
				current_fs.hide();
				animating = false;
			},
			easing: "easeInOutBack"
		});
	});
	$(".submit").click(function() {
		return false;
	});
</script>

@endpush

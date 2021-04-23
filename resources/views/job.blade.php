@extends('layout.app')

@stack('styles')
<link rel="stylesheet" href="{{asset('css/card-js.min.css')}}" />
<style>
    #multistepsform input.error,
    #multistepsform textarea.error,
    #multistepsform select.error {
        margin-bottom: 0;
    }

    label.error {
        display: inline-block !important;
        width: 100% !important;
        margin-top: 0 !important;
        font-size: 80% !important;
        color: #dc3545 !important;
        margin-bottom: 0 !important;
    }

    .swiper-wrapper {
        height: fit-content !important;
    }
</style>

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
        <form id="multistepsform" action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Place Order</li>
                <li>Choose Your Writer</li>
                <li>Order Complete</li>
                <li>Payment</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <div class="row">
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Document Type</label>
                                <select name="job[document_type]" required>
                                    <option value="">Select a document type</option>
                                    @foreach ($document_types as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Academic Level :</label>
                                <select name="job[academic_level]" required>
                                    <option value="">Select an academic level</option>
                                    @foreach ($academic_levels as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="form-group">
                                <label>Deadline :</label>
                                <input type="date" name="job[deadline]" class="form-control" placeholder="">
                            </div> --}}
                            <div class="form-group">
                                <label>Number of pages :</label>
                                <input type="number" name="job[pages]" class="form-control" placeholder="" required>
                                <label>275 words one page (double spaced)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Select your subject :</label>
                                <select name="job[subject]" required>
                                    <option value="">Select a subject</option>
                                    @foreach ($subjects as $item)
                                    <option value="{{$item}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Urgency :</label>
                                <select name="job[urgency]" required>
                                    <option value="">Select a urgency</option>
                                    @foreach ($urgencies as $item)
                                    <option data-urgency-price="{{$item['cost']}}" value="{{$item['value']}}">
                                        {{$item['value']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>What is your topic? </label>
                                <textarea name="job[topic]" placeholder="Write about…" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Paper instructions :</label>
                                <textarea name="job[paper_instructions]"
                                    placeholder="Any special requirements? Give us the main idea of the paper and other details (e.g. citation formatting)"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <div class='file file--upload'>
                                    <input type="file" id="file-upload" name="job_file[]" multiple
                                        placeholder="Upload now">
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
                    <div class="d-flex justify-content-between">
                        <h3 class="text-center">Find the best writer for your paper below.</h3>
                        <button type="button" class="btn btn-outline-primary previous">Edit Order</button>
                    </div>
                    <div class="testimonial-outr">
                        <div class="thrpy-slider swiper-container">
                            <div class="swiper-wrapper">
                                @foreach ($writers as $writer)
                                <div class="swiper-slide">
                                    <div class="testimonial-box ">
                                        <div class="testi-icon">
                                            <div class="testi-icon-innr"> <img src="{{asset('images/ch1.png')}}"
                                                    alt="" /> </div>
                                            <div class="testi-icon-txt">
                                                <h3>{{$writer->name}}</h3>
                                                <h5>№{{$writer->global_rating_rank}} In global rating</h5> <img
                                                    src="{{asset('images/star.png')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="chs-txt">
                                            <div>
                                                <h2>${{$writer->cost}}</h2>
                                            </div>
                                        </div>
                                        <div class="hire-txt">
                                            <div>
                                                <h2>{{$writer->success_rate}}%</h2>
                                                <p>Success Rate</p>
                                            </div> <button type="button" data-writer-cost="{{$writer->cost}}"
                                                data-writer="{{$writer->id}}" data-writer-name="{{$writer->name}}"
                                                class="btn btn-primary cmn_btn writer-select">Accept</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"> </div>
                        <div class="swiper-button-prev"> </div>
                    </div>
                </div>
                <input type="text" style="visibility: hidden" name="job[writer_id]" required>
                <input type="hidden" name="writer_cost">
                <input type="button" name="next" class="next action-button" value="Check your order" />
            </fieldset>

            <fieldset>
                <h3 class="text-center">Check your order and add funds to your balance</h3>
                <div class="ul-list">
                    <ul>
                        <li>
                            <div class="fld3">
                                <h5>Document Type :</h5> <span class="document_type_overview">Writing</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Select your subject :</h5> <span class="subject_overview">Healthcare</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Academic Level :</h5> <span class="academic_level_overview">Healthcare</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Urgency :</h5> <span class="urgency_overview">Healthcare</span>
                            </div>
                        </li>
                        <li>
                            <div class="fld3">
                                <h5>Total No Of Pages :</h5> <span class="pages_overview">5</span>
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
                                    <h3 class="writer_name_overview">Dr. Raychelle</h3>
                                </div>
                                <div class="wrtr-prc">
                                    <h3>$ <span class="writer_cost_overview">90</span></h3>
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
                                        $7</h5>
                                </div> <span> <span class="pages_overview">1</span> page × $7</span>
                            </div>

                            <div class="order urgency_price_overview_otr d-none">
                                <div class="order-in">
                                    <h4>Urgency price</h4>
                                    <h5>$ <span class="urgency_price_overview">5</span></h5>
                                </div>
                            </div>

                            <div class="order">
                                <div class="order-in">
                                    <h4>Writer Cost</h4>
                                    <h5>$ <span class="writer_cost_overview">5</span></h5>
                                </div>
                            </div>

                            <div class="order">
                                <div class="order-in">
                                    <h4>Total price</h4>
                                    <h5>$ <span class="total_price_overview">90</span></h5>
                                </div>
                                <br>
                                <p>The funds will be held in your account until you release them. </p>

                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="next" class="next action-button" class="submit action-button"
                    value="Proceed to checkout" />
            </fieldset>

            <fieldset>
                <h3 class="text-center">Check your order and add funds to your balance</h3>
                <div class="row card-js">
                    <div class="col-md-6 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Name on Card</label>
                                <input class='name form-control' size='4' type='text' required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Card Number</label>
                                <input autocomplete='off' class='card-number form-control card-num' name="card_number"
                                    size='20' type='text' required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>CVC</label>
                                <input autocomplete='off' class='cvc form-control card-cvc' name="card_cvv"
                                    placeholder='e.g 595' size='4' type='text' required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Expiration Month</label>
                                <input class='expiry-month form-control card-expiry-month' placeholder='MM' size='2'
                                    name="card_exp_month" type='text' required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 frm-in">
                        <div class="frm-otr">
                            <div class="form-group">
                                <label>Expiration Year</label>
                                <input class='expiry-year form-control card-expiry-year' placeholder='YYYY' size='4'
                                    name="card_exp_year" type='text' required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" name="submit" class="submit action-button" value="Make Payment" />
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    var current_fs, next_fs, previous_fs;
	var left, opacity, scale;
	var animating;


	$(".next").click(function() {

		current_fs = $(this).parent();

        let isValid = $("#multistepsform").valid();
        current_fs.children("[required]").each(function(i, e) {
            const valid = current_fs.validate().element(jQuery(e));
            if (!valid)
                isValid = false;
        });

		next_fs = $(this).parent().next();


        if (!isValid) return false;
        if(animating) return false;
        overview();
		animating = true;

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
		current_fs = $(this).closest('fieldset');
		previous_fs = $(this).closest('fieldset').prev();
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
					left: left,
				});
				previous_fs.css({
                    transform: "scale(" + scale + ")",
					opacity: opacity,
                    'position': 'relative'
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
	// $(".submit").click(function() {
	// 	return false;
	// });

    function overview() {
        $('.document_type_overview').text($('select[name="job[document_type]"] option:selected').text());
        $('.academic_level_overview').text($('select[name="job[academic_level]"] option:selected').text());
        $('.urgency_overview').text($('select[name="job[urgency]"] option:selected').text());
        $('.subject_overview').text($('select[name="job[subject]"] option:selected').text());
        $('.pages_overview').text($('input[name="job[pages]"]').val());
        var urgency_price = parseFloat($('select[name="job[urgency]"] option:selected').data('urgency-price'));

        if (urgency_price > 0) {
            $('.urgency_price_overview_otr').removeClass('d-none');
            $('.urgency_price_overview').text(urgency_price);
        } else {
            $('.urgency_price_overview_otr').addClass('d-none');
        }

        var total_price = parseInt(urgency_price + parseInt($('input[name="job[pages]"]').val()) * 7) + parseInt($('input[name="writer_cost"]').val());

        $('.total_price_overview').text(total_price);
    }

    $(document).on('click', '.writer-select', function(){
        var writer_id = $(this).data('writer');

        $('input[name="job[writer_id]"]').val(writer_id);
        $('input[name="writer_cost"]').val($(this).data('writer-cost'));
        $('.writer_cost_overview').text($(this).data('writer-cost'));
        $('.writer_name_overview').text($(this).data('writer-name'));

        $(this).closest('fieldset').find('.next').trigger('click');
    })
</script>

<script src="{{asset('js/card-js.min.js')}}"></script>

@endpush

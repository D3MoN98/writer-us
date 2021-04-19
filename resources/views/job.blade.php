@extends('layout.app')

@stack('styles')
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
                                    <option value="Essay">Essay</option>
                                    <option value="Tem Paper">tem Paper</option>
                                    <option value="Research Paper">Research Paper</option>
                                    <option value="Research Report">research Report</option>
                                    <option value="Coursework">Coursework</option>
                                    <option value="Book report">Book report</option>
                                    <option value="Book Review">Book Review</option>
                                    <option value="Movie Review">Movie Review</option>
                                    <option value="Research Summary">Research Summary</option>
                                    <option value="Dissertation">Dissertation</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Thesis Proposal">Thesis Proposal</option>
                                    <option value="Project Proposal">Project Proposal</option>
                                    <option value="Dissertation Chapter-Abstract">Dissertation Chapter-Abstract</option>
                                    <option value="Dissertation Chapter-AbstractA">Dissertation Chapter-AbstractA
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Academic Level :</label>
                                <select name="job[academic_level]" required>
                                    <option value="">Select an academic level</option>
                                    <option value="School">School</option>
                                    <option value="College">College</option>
                                    <option value="University">University</option>
                                    <option value="Masters">Masters</option>
                                    <option value="PhD">PhD</option>
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
                                    <option value="Accounting">Accounting</option>
                                    <option value="Anthropology">Anthropology</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Theatre and Film">Theatre and Film</option>
                                    <option value="Biology">Biology</option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Criminology">Criminology</option>
                                    <option value="Economics">Economics</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="Ethics">Ethics</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Geography">Geography</option>
                                    <option value="Healthcare">Healthcare</option>
                                    <option value="History">History</option>
                                    <option value="Legal Issues">Legal Issues</option>
                                    <option value="Linguistics">Linguistics</option>
                                    <option value="Literature">Literature</option>
                                    <option value="Management">Management</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Mathematics">Mathematics</option>
                                    <option value="Music">Music</option>
                                    <option value="Nursing">Nursing</option>
                                    <option value="Psychology">Psychology</option>
                                    <option value="Sociology">Sociology</option>
                                    <option value="Sport">Sport</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Tourism">Tourism</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Urgency :</label>
                                <select name="job[urgency]" required>
                                    <option value="">Select a urgency</option>
                                    <option value="30 Days">30 Days</option>
                                    <option value="14 Days">14 Days</option>
                                    <option value="10 Days">10 Days</option>
                                    <option value="7 Days">7 Days</option>
                                    <option value="5 Days">5 Days</option>
                                    <option value="3 Days">3 Days</option>
                                    <option value="2 Days">2 Days</option>
                                    <option value="24 Hours">24 Hours</option>
                                    <option value="16 Hours">16 Hours</option>
                                    <option value="12 Hours">12 Hours</option>
                                    <option value="5 Hours">5 Hours</option>
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
                    <h3 class="text-center">Find the best writer for your paper below.</h3>
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
                                            </div> <button type="button" data-writer="{{$writer->id}}"
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    var current_fs, next_fs, previous_fs;
	var left, opacity, scale;
	var animating;


	$(".next").click(function() {

		current_fs = $(this).parent();

        let isValid = $("#multistepsform").valid();
        // console.log(isValid);
        // let isValid = true;
        // current_fs.children("[required]").each(function(i, e) {
        //     const valid = current_fs.validate().element(jQuery(e));
        //     if (!valid)
        //         isValid = false;
        // });

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
	// $(".submit").click(function() {
	// 	return false;
	// });

    function overview() {
        $('.document_type_overview').text($('select[name="job[document_type]"] option:selected').text());
        $('.academic_level_overview').text($('select[name="job[academic_level]"] option:selected').text());
        $('.urgency_overview').text($('select[name="job[urgency]"] option:selected').text());
        $('.subject_overview').text($('select[name="job[subject]"] option:selected').text());
        $('.pages_overview').text($('input[name="job[pages]"]').val());
    }

    $(document).on('click', '.writer-select', function(){
        var writer_id = $(this).data('writer');

        $('input[name="job[writer_id]"]').val(writer_id);

        $(this).closest('fieldset').find('.next').trigger('click');
    })
</script>

@endpush

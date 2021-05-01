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
                    <h1>Blog Details
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Bnr End-->
<!--LATEST-BLOG-->
<section class="lat-blog-sec">
    <div class="container">
        <div class="lat-blg-otr lat-bl-inn">
            <div class="row">
                <div class="col-lg-8 rgt lt-bl wow fadeInRight">
                    <div class="blog-sec">
                        <div class="singl-blog-outr">
                            <div class="cmn_hdr wow fadeInDown">
                                <h2>{{$blog->title}}
                                </h2>
                            </div>
                            <div class="sngl-blog-innr">
                                <div class="sngl-blog-in">
                                    <div class="sngl-blog-pic">
                                        <!-- <img src="images/job-bnr.jpg" alt=""/> -->
                                        <img src="{{asset('storage/'.$blog->images[0])}}" alt="" />
                                    </div>
                                    <div class="blg-txt-1">
                                        <ul>
                                            <li><a href="#"><img src="{{asset('images/writters_iccn.png')}}"
                                                        alt=""><span>{{ucwords($blog->user->name) ?? null}}
                                                    </span></a></li>
                                            <li><a href="#"><img src="{{asset('images/date.png')}}"
                                                        alt=""><span>{{$blog->created_at->format('M d. Y')}}
                                                    </span></a></li>
                                            <li><a href="#"><img src="{{asset('images/chat_icc.png')}}"
                                                        alt=""><span>{{$blog->comments->count()}}
                                                        Comments
                                                    </span></a></li>
                                        </ul>
                                    </div>
                                    <div class="sngl-blog-content">
                                        {!!$blog->content!!}
                                    </div>
                                </div>
                                <div class="bck-cbd">
                                    <div class="wishlist-outr">
                                        <h5>Tags:</h5>
                                        <ul>
                                            @foreach ($blog->tags as $tag)
                                            <li> <a href="javascript:void(0);"
                                                    class="commn-btn pulse btn btn-primary bg-btn">{{$tag}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="wishlist-outr scl-wish">
                                        <h5>Share :</h5>
                                        <ul>
                                            <li> <a href="javascript:void(0);"
                                                    class="commn-btn pulse btn btn-primary bg-btn"><i
                                                        class="fa fa-facebook" aria-hidden="true"></i>Facebook</a>
                                            </li>
                                            <li> <a href="javascript:void(0);"
                                                    class="commn-btn pulse btn btn-primary bg-btn tw-btn"><i
                                                        class="fa fa-twitter" aria-hidden="true"></i>Twitter</a>
                                            </li>
                                            <li> <a href="javascript:void(0);"
                                                    class="commn-btn pulse btn btn-primary bg-btn inn-btn"><i
                                                        class="fa fa-instagram" aria-hidden="true"></i>Instagram</a>
                                            </li>
                                            <li> <a href="javascript:void(0);"
                                                    class="commn-btn pulse btn btn-primary bg-btn link-btn"><i
                                                        class="fa fa-linkedin" aria-hidden="true"></i>LinkedIn</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="comment-sec">
                                    <h3>Comments </h3>
                                    <div class="comment-outr">
                                        @foreach ($blog->comments as $comment)
                                        <div class="comment-innr">
                                            <div class="reply-picc-bx">
                                                <div class="reply-picc">
                                                    <img src="{{asset('images/ch2.png')}}" alt="" />
                                                </div>
                                            </div>
                                            <div class="reply-content">
                                                <h4>{{$comment->user->name}}</h4>
                                                <p>{{$comment->comment}}</p>
                                                {{-- <a href="javascript:void(0);" class="">Reply comment</a> --}}
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @auth
                                <div class="contact_innr blog-cmnt-frm">
                                    <div class="cmnnt-txt">
                                        <h4>Leave a comment</h4>
                                    </div>
                                    <div class="cus_frm">
                                        <form action="{{route('blog.comment.create', $blog->id)}}" method="post">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group descrip">
                                                        <textarea class="form-control" placeholder="Comment..."
                                                            name="comment[comment]" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" value="Post a comment">
                                        </form>
                                    </div>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 cap-lft">
                    <div class="cbd-lft-in">
                        <div class="srch-box">
                            <form action="{{route('blog.index')}}" method="get">
                                <div class="form-group has-search">
                                    <input type="text" name="search" value="{{request()->search}}" class="form-control"
                                        placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <div class="shp_krtm">
                            <div class=" my-accr">
                                <div class="qussn">
                                    <h1>Popular Post</h1>
                                    <div class="pplr_img">
                                        <ul>
                                            @foreach ($blogs as $blog)
                                            <li>
                                                <a href="{{route('blog.show', $blog->slug)}}">
                                                    <em><img src="{{asset('storage/'.$blog->images[0])}}" alt=""></em>
                                                    <span>{{$blog->title}}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="find-in">
                            <img src="{{asset('images/fb.jpg')}}" alt="">
                        </div>
                        <div class="shp_krtm ">
                            <div class="qussn">
                                <h1>Categories</h1>
                                <div class="cat-list">
                                    <ul>
                                        @foreach ($blog_categories as $category)
                                        <li>
                                            <a href="{{route('blog-category.index', $category->slug)}}">
                                                {{$category->name}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

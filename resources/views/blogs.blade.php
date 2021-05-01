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

                            <div class="sngl-blog-innr">

                                @if ($blogs->count() > 0)
                                @foreach ($blogs as $blog)
                                <div class="sngl-blog-in">
                                    <div class="sngl-blog-pic">
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
                                        <div class="cmn_hdr wow fadeInDown">
                                            <h2>{{$blog->title}}</h2>
                                        </div>
                                        <p>{{$blog->excerpt}}</p>
                                        <div class="blog_btn_area">
                                            <div class="blog_btnn">
                                                <a href="{{route('blog.show', $blog->slug)}}"
                                                    class="btn btn-primary cmn_btn bn-btn">read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                No blog found
                                @endif

                                <div class="pgtnnn">
                                    {{$blogs->links()}}
                                </div>
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
                            <img src="images/fb.jpg" alt="">
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
<!--  footer     -->

@endsection

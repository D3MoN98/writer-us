<header id="header_id">
    <div class="cus_nav">
        <div class="cus_nav_outr">
            <div class="container">
                <div class="cus_nav_innr">
                    <div class="logo_area">
                        <a href="{{route('/')}}"><img class="img-fluid" src="{{asset('images/logo.png')}}" alt="" /></a>
                    </div>
                    <div class="nav_area">
                        <div class="rht_na_flx">
                            <div class="right_nav">
                                <div class="navbar-header">
                                    <nav class="navbar navbar-expand-lg">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                            aria-expanded="false" aria-label="Toggle navigation"> <span
                                                class="navbar-toggler-icon"></span> </button>
                                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                            <ul class="navbar-nav">
                                                <li class="nav-item"> <a class="nav-link"
                                                        href="{{route('writer')}}">Writing
                                                        Services</a> </li>
                                                <li class="nav-item"> <a class="nav-link"
                                                        href="{{asset('blog')}}">Blogs</a> </li>
                                                <li class="nav-item"> <a class="nav-link" href="{{route('about-us')}}">
                                                        About Us
                                                    </a> </li>
                                                <li class="nav-item"> <a class="nav-link"
                                                        href="{{route('testimonials')}}">Testimonials </a> </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            <div class="hdr-btn">
                                @guest
                                <a href="" class="btn btn-primary cmn_btn" data-toggle="modal"
                                    data-target="#loginModal">log in</a>
                                <a data-toggle="modal" data-target="#loginModal"
                                    class="btn btn-primary cmn_btn lg-in">hire writer</a>
                                @endguest
                                @auth
                                <div class="dropdown open">
                                    <button class="btn cmn_btn dropdown-toggle" type="button" id="triggerId"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{explode(' ', Auth::user()->name)[0]}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                                        <a class="dropdown-item" href="{{route('job.index')}}">Jobs</a>
                                        <a class="dropdown-item" href="{{route('logout')}}">log Out</a>
                                    </div>
                                </div>
                                <a href="{{route('job.create')}}" class="btn btn-primary cmn_btn lg-in">hire writer</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

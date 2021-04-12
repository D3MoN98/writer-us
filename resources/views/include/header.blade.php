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
                                                <li class="nav-item"> <a class="nav-link" href="how-its-work.html">How
                                                        it works </a> </li>
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
                                @endguest
                                @auth
                                <a href="{{route('logout')}}" class="btn btn-primary cmn_btn">log Out</a>
                                @endauth
                                <a href="{{route('job')}}" class="btn btn-primary cmn_btn lg-in">hire writer</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

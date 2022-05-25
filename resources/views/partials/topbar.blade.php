<div class="topbar-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-7 align-self-center">
                <div class="topbar-menu text-md-left text-center">
                    <ul class="social-area social-area-2">
                        <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                        <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 align-self-center">
                <div class="topbar-menu text-md-right text-center">
                    <ul class="align-self-center">
                        @if(Auth::user())
                            <li><p style="color: white">Hello {{Auth::user()->name}}</p></li>
                            <li>
                                <a href="{{route('user.logout')}}">
                                    <p style="color: white">
                                        Sign out
                                    </p>

                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{route('user.login-form')}}">
                                    <p style="color: white">
                                        Sign in
                                    </p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

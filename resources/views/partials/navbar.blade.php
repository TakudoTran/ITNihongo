<nav class="navbar navbar-expand-lg">
    <div class="container nav-container">
        <div class="responsive-mobile-menu">
            <div class="logo d-lg-none d-block">
                <a class="main-logo" href="index.html"><img src="{{asset('nextpage-lite/assets/img/logo.png')}}" alt="img"></a>
            </div>
            <button class="menu toggle-btn d-block d-lg-none" data-target="#nextpage_main_menu"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-left"></span>
                <span class="icon-right"></span>
            </button>
        </div>
        <div class="nav-right-part nav-right-part-mobile">
            <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
        </div>
        <div class="collapse navbar-collapse" id="nextpage_main_menu">
            <ul class="navbar-nav menu-open">
                <li class="current-menu-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="current-menu-item">
                    <a href="{{route('sharing.index')}}">Sharing</a>
                </li>
                <li class="current-menu-item">
                    <a href="#latest">Discussion</a>
                </li>
                <li class="current-menu-item">
                    <a href="#grid">News Grid</a>
                </li>
                <li class="current-menu-item">
                    <a target="_blank" href="https://1.envato.market/5OQX2">Pro Version</a>
                </li>
            </ul>
        </div>
        <div class="nav-right-part nav-right-part-desktop">
            <div class="menu-search-inner">
                <input type="text" placeholder="Search For">
                <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </div>
</nav>

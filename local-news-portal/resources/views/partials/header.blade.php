<style>
.new-header {padding: 0;}
.new-logo-area {padding: 10px 0;}
.header-banner {padding: 20px 0;}
@media only screen and (max-width: 767px) {
  .new-header {padding: 0;}
}
</style>

<!--Header Start Here-->
<style>
.footer-details {padding: 0;}
.footer-col-1 {padding-top: 25px;padding-left: 0;text-align: right;}
.footer-menu ul {padding-left: 0;margin-bottom: 0;list-style: none;display: inline-block;}
.footer-menu ul li {display: inline-block;}
.footer-menu ul li a {color: #fff;padding: 3px 10px;border: 1px solid #fff;font-size: 16px;margin-right: 8px;display: inline-block;margin-bottom: 10px;}
.footer-menu ul li a:hover {border: 1px solid #008854;background: #008854;}
</style>

<header>
  <div class="new-header">
    <div class="container custom-container">
      <div class="row custom-row">
        <div class="col-md-4 col-lg-4 custom-padding">
          <div class="new-logo-area">
            <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('media/common/newsnarayanganj24.jpg') }}"
                alt="News Narayanganj"></a>
          </div>
        </div>
        <div class="col-md-8 col-lg-8 custom-padding d-none d-md-block">
          <div class="header-banner">
            <a href="http://bongosoftbd.com/"><img class="img-fluid"
                src="{{ asset('media/common/bongosoft.gif') }}" alt="Bongosoft Ltd."></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="header-info">
    <div class="container custom-container">
      <div class="row custom-row">
        <div class="col-sm-9 col-md-9 d-none d-md-block d-lg-block custom-padding">
          <small class="top-date">
            <i class="fa fa-map-marker" aria-hidden="true"></i> ঢাকা
            <i class="fa fa-calendar" aria-hidden="true"></i>
            {{ \Carbon\Carbon::now()->locale('bn')->translatedFormat('l, d F, Y') }}
          </small>
        </div>
        <div class="col-sm-3 col-md-3 hidden-xs custom-padding">
          <form class="search_submit" action="{{ route('search') }}" method="get" id="cse-search-box" role="search">
            <div class="input-group input-group-sm">
              <input class="form-control search_submit" placeholder="অনুসন্ধানের জন্য লিখুন..." type="text" name="q" value="{{ request('q') }}">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>

<header class="header headerbg-darkcolor nav-container" id="header">
  <div class="container custom-container">
    <div class="row custom-row">
      <div class="col-sm-12 custom-padding">
        <nav class="bootsnav navbar navbar-transparent">
          <div class="navbar-header">
            <button aria-controls="navbar-menu" aria-expanded="false" class="navbar-toggle navbar-toggler"
              data-target="#navbar-menu" data-toggle="collapse" type="button">
              <span class="hidden">MENU</span> <i class="fa fa-bars"></i>
            </button>
          </div>
          
          <div class="collapse navbox-collapse" id="navbar-menu">
            <ul class="nav navbar-right" data-in="fade-In-Down" data-out="fade-Out-Up">
              <li><a id="home" href="{{ route('home') }}"> <span> <i class="fa fa-home"></i> </span></a></li>
              @foreach($categories as $category)
                <li><a id="{{ $category->slug }}" href="{{ route('category.show', $category->slug) }}"> <span> {{ $category->name_bn }} </span></a></li>
              @endforeach
              
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span> অন্যান্য </span></a>
                <ul class="dropdown-menu megamenu-content">
                  <li><a href="{{ route('photo-gallery.index') }}"> ফটো গ্যালারি </a></li>
                  <li><a href="{{ route('video-gallery.index') }}"> ভিডিও গ্যালারি </a></li>
                  <li><a href="{{ route('archives') }}"> আর্কাইভ </a></li>
                  <li><a href="{{ route('page.show', 'contact') }}"> যোগাযোগ </a></li>
                  <li><a href="{{ route('admin.login') }}"> অ্যাডমিন প্যানেল </a></li>
                </ul>
              </li>
            </ul>
          </div>
          
          <!-- Start Atribute Navigation -->
          <div class="attr-nav">
            <ul>
              <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  
  <div class="top-search">
    <div class="container custom-container">
      <div class="col-lg-3 col-md-12 col-12 top-search-secton">
        <form action="{{ route('search') }}" class="search-form" method="get">
          <div class="input-group">
            <label for="search" class="sr-only"> অনুসন্ধান করুন </label>
            <input type="text" class="form-control" name="q" id="q" placeholder=" অনুসন্ধান করুন " value="{{ request('q') }}">
            <button class="input-group-addon" type="submit" name="button"><i class="fa fa-search"></i></button>
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
          </div>
        </form>
      </div>
    </div>
  </div>
</header>
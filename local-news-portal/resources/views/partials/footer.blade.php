@php
    use App\Models\Setting;
    $siteName = Setting::get('site_name_bn', 'নিউজ নারায়ণগঞ্জ');
    $siteDescription = Setting::get('site_description', 'আমাদের সীমাবদ্ধতা অনেক, তবুও সত্য লেখার চেষ্টা অবিরাম।');
    $contactPhone = Setting::get('contact_phone');
    $contactEmail = Setting::get('contact_email');
    $facebookUrl = Setting::get('facebook_url');
    $twitterUrl = Setting::get('twitter_url');
@endphp

<footer class="footer-area" style="background: #1da255; padding: 40px 0; color: white;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <img src="{{ asset('media/common/newsnarayanganj24.jpg') }}" alt="News Narayanganj" style="max-width: 200px;">
                </div>
                <p style="margin-top: 15px;">{{ $siteDescription }}</p>
                
                @if($contactPhone || $contactEmail)
                    <div style="margin-top: 20px;">
                        @if($contactPhone)
                            <p><i class="fa fa-phone"></i> {{ $contactPhone }}</p>
                        @endif
                        @if($contactEmail)
                            <p><i class="fa fa-envelope"></i> {{ $contactEmail }}</p>
                        @endif
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="footer-menu">
                    <h4>গুরুত্বপূর্ণ লিংক</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 8px;"><a href="{{ route('home') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> হোম</a></li>
                        <li style="margin-bottom: 8px;"><a href="{{ route('page.show', 'contact') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> যোগাযোগ</a></li>
                        <li style="margin-bottom: 8px;"><a href="{{ route('page.show', 'privacy-policy') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> গোপনীয়তা নীতি</a></li>
                        <li style="margin-bottom: 8px;"><a href="{{ route('page.show', 'terms-conditions') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> শর্তাবলী</a></li>
                        <li style="margin-bottom: 8px;"><a href="{{ route('archives') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> আর্কাইভ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-gallery">
                    <h4>গ্যালারি</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 8px;"><a href="{{ route('photo-gallery.index') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> ফটো গ্যালারি</a></li>
                        <li style="margin-bottom: 8px;"><a href="{{ route('video-gallery.index') }}" style="color: #fff; text-decoration: none;"><i class="fa fa-angle-right"></i> ভিডিও গ্যালারি</a></li>
                    </ul>
                    
                    @if($facebookUrl || $twitterUrl)
                        <div style="margin-top: 20px;">
                            <h5>সামাজিক যোগাযোগ</h5>
                            <div>
                                @if($facebookUrl)
                                    <a href="{{ $facebookUrl }}" target="_blank" style="color: #fff; margin-right: 10px; font-size: 20px;">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($twitterUrl)
                                    <a href="{{ $twitterUrl }}" target="_blank" style="color: #fff; margin-right: 10px; font-size: 20px;">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 30px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
            <div class="col-md-12 text-center">
                <p>&copy; {{ date('Y') }} {{ $siteName }}. All rights reserved. | Developed with Laravel 12</p>
            </div>
        </div>
    </div>
</footer>
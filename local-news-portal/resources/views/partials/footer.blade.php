@php
    use App\Models\Setting;
    $siteName = Setting::get('site_name_bn', 'দ্যা নিউজ নারায়ণগঞ্জ ডটকম');
    $contactEmail = Setting::get('contact_email', 'info@newsnarayanganj.com');
    $facebookUrl = Setting::get('facebook_url', 'https://web.facebook.com/newsnarayanganjdotcom');
    $youtubeUrl = Setting::get('youtube_url', 'https://www.youtube.com/@newsnarayanganj');
@endphp

<footer>
    <div class="footer-middle">
        <div class="container custom-container">
            <div class="row custom-row footer-middle-row">
                <div class="col-lg-8 col-md-12 custom-padding">
                    <div class="footer-details">
                        <h3>সম্পাদক : <a class="owner-text" href="#" style="color: #fff;">শাহজাহান শামীম</a></h3>
                        <span><i class="fa fa-map-marker"></i> ১৯৩ প্রেসিডেন্ট রোড, সিরাজ ম্যানশন, চাষাঢ়া, নারায়ণগঞ্জ।</span>
                        <br>
                        <span class="small small-email">
                            <i class="fa fa-envelope"></i> <a href="mailto:{{ $contactEmail }}" style="color: #fff;">{{ $contactEmail }}</a><br>
                        </span>
                        <div class="social-icon-wrapper">
                            <div class="social-icon">
                                <a target="_blank" href="{{ $facebookUrl }}"><span>Facebook</span></a>
                                <a href="#"><span>Twitter</span></a>
                                <a href="#"><span>Google+</span></a>
                                <a target="_blank" href="{{ $youtubeUrl }}"><span>Youtube</span></a>
                                <a href="#"><span>Pinterest</span></a>
                                <a href="#"><span>Rss</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12 custom-padding">
                    <div class="footer-menu footer-col-1">
                        <ul>
                            <li><a href="{{ route('page.show', 'terms-conditions') }}" target="_blank">ব্যবহার বিধি</a></li>
                            <li><a href="{{ route('page.show', 'privacy-policy') }}" target="_blank">গোপনীয়তা নীতি</a></li>
                            <li><a href="{{ route('page.show', 'contact') }}" target="_blank">যোগাযোগ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container custom-container">
            <div class="row custom-row footer-bottom-row">
                <div class="col-md-6 col-12 custom-padding">
                    <p>© {{ date('Y') }} সর্বস্বত্ব সংরক্ষিত , {{ $siteName }} ।</p>
                </div>
                <div class="col-md-6 col-12 custom-padding">
                    <div class="design-link">
                        <p>Design & Developed by <a target="_blank" href="http://www.bongosoftbd.com/">Bongosoft Ltd.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
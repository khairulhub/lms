@php
    $setting = App\Models\SiteSetting::find(1);
@endphp


<section class="footer-area pt-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <a href="index.html">
                        <img src="{{ asset($setting->logo) }}" alt="footer logo" class="footer__logo">
                    </a>
                    <ul class="pt-4 generic-list-item">
                        <li><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a></li>
                        <li><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a></li>
                        <li>{{ $setting->address }}</li>
                    </ul>
                    <h3 class="pt-4 pb-2 fs-20 font-weight-semi-bold">We are on</h3>
                    <ul class="social-icons social-icons-styled">
                        <li class="mr-1"><a href="{{ $setting->facebook }}" class="facebook-bg"><i
                                    class="la la-facebook"></i></a></li>
                        <li class="mr-1"><a href="{{ $setting->twitter }}" class="twitter-bg"><i
                                    class="la la-twitter"></i></a></li>
                        <li class="mr-1"><a href="{{ $setting->instagram }}" class="instagram-bg"><i
                                    class="la la-instagram"></i></a></li>
                        <li class="mr-1"><a href="{{ $setting->linkedin }}" class="linkedin-bg"><i
                                    class="la la-linkedin"></i></a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Company</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                        <li><a href="{{ route('become.instructor') }}">Become a Teacher</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="{{ url('/view/all/posts') }}">Blog</a></li>
                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->



            @php

$categories = App\Models\Category::orderBy('category_name', 'ASC')->get();

@endphp
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Categories</h3>
                    <span class="section-divider section--divider"></span>
                    <ul class="generic-list-item">
                        @foreach ($categories as $category)

                        <li><a href="{{ url('category/'.$category->id.'/'.$category->category_slug) }}">{{ $category->category_name }}</a></li>
                        @endforeach

                    </ul>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 responsive-column-half">
                <div class="footer-item">
                    <h3 class="fs-20 font-weight-semi-bold">Download App</h3>
                    <span class="section-divider section--divider"></span>
                    <div class="mobile-app">
                        <p class="pb-3 lh-24">Download our mobile app and learn on the go.</p>
                        <a href="#" class="mb-2 d-block hover-s"><img src="images/appstore.png"
                                alt="App store" class="img-fluid"></a>
                        <a href="#" class="d-block hover-s"><img src="images/googleplay.png"
                                alt="Google play store" class="img-fluid"></a>
                    </div>
                </div><!-- end footer-item -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <div class="section-block"></div>
    <div class="py-4 copyright-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="copy-desc">&copy; {{ $setting->copyright }}</p>
                </div><!-- end col-lg-6 -->
                <div class="col-lg-6">
                    <div class="flex-wrap d-flex align-items-center justify-content-end">
                        <ul class="flex-wrap generic-list-item d-flex align-items-center fs-14">
                            <li class="mr-3"><a href="terms-and-conditions.html">Terms & Conditions</a></li>
                            <li class="mr-3"><a href="privacy-policy.html">Privacy Policy</a></li>
                        </ul>

                    </div>
                </div><!-- end col-lg-6 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end copyright-content -->
</section><!-- end footer-area -->

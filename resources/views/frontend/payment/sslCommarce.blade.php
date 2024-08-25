@extends('frontend.master')
@section('home')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title')
Checkout | Code Tree
@endsection

@php
    $setting = App\Models\SiteSetting::find(1);
@endphp

<!-- ================================
    START BREADCRUMB AREA
================================= -->
<section class="breadcrumb-area section-padding img-bg-2">
    <div class="overlay"></div>
    <div class="container">
        <div class="flex-wrap breadcrumb-content d-flex align-items-center justify-content-between">
            <div class="section-heading">
                <h2 class="text-white section__title">Checkout</h2>
            </div>
            <ul class="flex-wrap generic-list-item generic-list-item-white generic-list-item-arrow d-flex align-items-center">
                <li><a href="index.html">Home</a></li>
                <li>Payment</li>
            </ul>
        </div><!-- end breadcrumb-content -->
    </div><!-- end container -->
</section><!-- end breadcrumb-area -->
<!-- ================================
    END BREADCRUMB AREA
================================= -->

<!-- ================================
    START CONTACT AREA
================================= -->
<section class="cart-area section--padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="pb-3 card-title fs-22">Billing Details</h3>
                        <div class="divider"><span></span></div>


                        <form method="post" id="paymentForm" >
                            @csrf



                            <div class="input-box col-lg-6">
                                <label class="label-text">Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="name" type="text" name="name" value="{{ Auth::user()->name }}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">User Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="username" type="text" name="username" value="{{ Auth::user()->username }}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="input-box col-lg-12">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="email" type="email" name="email" value="{{ Auth::user()->email }}">
                                    <span class="la la-envelope input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Phone Number</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="phone" type="text" name="phone" value="{{ Auth::user()->phone }}">
                                    <span class="la la-phone input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="input-box col-lg-12">
                                <label class="label-text">Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" id="address" type="text" name="address" value="{{ Auth::user()->address }}">
                                    <span class="la la-map-marker input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="btn-box col-lg-12">
                                <div class="mb-4 custom-control custom-checkbox fs-15">
                                    <input type="checkbox" class="custom-control-input" id="agreeCheckbox" required>
                                    <label class="custom-control-label custom--control-label" for="agreeCheckbox">I agree to the
                                        <a href="terms-and-conditions.html" class="text-color hover-underline">terms and conditions</a> and
                                        <a href="privacy-policy.html" class="text-color hover-underline">privacy policy</a>
                                    </label>
                                </div><!-- end custom-control -->
                                <p class="pb-1 text-black-50"><i class="mr-1 la la-lock fs-24"></i>Secure Connection</p>
                                <p class="fs-14">Your information is safe with us!</p>
                            </div><!-- end btn-box -->

                        </div><!-- end card-body -->
                    </div><!-- end card -->

                </div><!-- end col-lg-7 -->
                <div class="col-lg-5">
                    <div class="card card-item">
                        <div class="card-body">
                            <h3 class="pb-3 card-title fs-22">Order Details</h3>
                            <div class="divider"><span></span></div>
                            <div class="order-details-lists">
                                @foreach ($carts as $cart)
                                <input type="hidden" name="slug[]" value="{{ $cart->options->slug }}">
                                <input type="hidden" name="course_id[]" value="{{ $cart->id }}">
                                <input type="hidden" name="course_title[]" value="{{ $cart->name }}">
                                <input type="hidden" name="price[]" value="{{ $cart->price }}">
                                <input type="hidden" name="instructor_id[]" value="{{ $cart->options->instructor_id }}">

                                <div class="pb-3 mb-3 media media-card border-bottom border-bottom-gray">
                                    <a href="{{url('course/details/'.$cart->id.'/'.$cart->options->slug)}}" class="media-img">
                                        <img src="{{ asset($cart->options->image) }}" alt="Cart image">
                                    </a>
                                    <div class="media-body">
                                        <h5 class="pb-2 fs-15"><a href="{{url('course/details/'.$cart->id.'/'.$cart->options->slug)}}">{{ $cart->name }}</a></h5>
                                        <p class="text-black font-weight-semi-bold lh-18">{{ $cart->price }} </p>
                                    </div>
                                </div><!-- end media -->
                                @endforeach
                            </div><!-- end order-details-lists -->
                            <a href="{{ route('mycart') }}" class="btn-text"><i class="mr-1 la la-edit"></i>Edit</a>
                            </div><!-- end card-body -->
                            </div><!-- end card -->
                            <div class="card card-item">
                                <div class="card-body">
                            <h3 class="pb-3 card-title fs-22">Order Summary</h3>
                            <div class="divider"><span></span></div>

                            @if (Session::has('cupon'))
                            <ul class="generic-list-item generic-list-item-flash fs-15">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="text-black">Sub Total :</span>
                                    <span>${{ $cartTotal }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="text-black">Coupon Name:</span>
                                    <span>{{ session()->get('cupon')['cupon_name'] }} ({{ session()->get('cupon')['cupon_discount'] }}%)</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="text-black">Coupon discounts:</span>
                                    <span>-$ {{ session()->get('cupon')['cupon_validity'] }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                    <span class="text-black">Total:</span>
                                    <span>${{ session()->get('cupon')['total_amount'] }}</span>
                                </li>
                            </ul>
                            <input type="hidden" name="total" value="{{ $cartTotal }}">
                            @else
                            <ul class="generic-list-item generic-list-item-flash fs-15">
                                <li class="d-flex align-items-center justify-content-between font-weight-semi-bold">
                                    <span class="text-black">Grand price:</span>
                                    <span>{{ $setting->currency }} {{ $cartTotal }}</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between font-weight-bold">
                                    <span class="text-black">Total:</span>
                                    <span>{{ $setting->currency }} {{ $cartTotal }}</span>
                                </li>
                            </ul>
                            <input type="hidden" id="total" name="total" value="{{ $cartTotal }}">
                            @endif

                            <div class="pt-3 btn-box border-top border-top-gray">
                                <p class="mb-2 fs-14 lh-22">Aduca is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                                <p class="mb-3 fs-14 lh-22">By completing your purchase you agree to these <a href="#" class="text-color hover-underline">Terms of Service.</a></p>


                            {{-- <form method="POST" id="paymentForm" action="{{ route('pay-via-ajax') }}">
                            @csrf --}}

                            <input type="hidden" id="name" name="name" value="{{ Auth::user()->name }}">
                            <input type="hidden" id="username" name="username" value="{{ Auth::user()->username }}">
                            <input type="hidden" id="email" name="email" value="{{ Auth::user()->email }}">
                            <input type="hidden" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                            <input type="hidden" id="address" name="address" value="{{ Auth::user()->address }}">
                            <input type="hidden" id="total" name="total" value="{{ $cartTotal }}">

                            {{-- <button type="button" id="sslczPayBtn"
                                        token=""
                                        postdata=""
                                        order="If you already have the transaction generated for current order"
                                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                                </button> --}}

                                <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn"
                        token="if you have any token validation"
                        postdata="your javascript arrays or objects which requires in backend"
                        order="If you already have the transaction generated for current order"
                        endpoint="{{ url('/pay-via-ajax') }}"> Pay Now
                </button>
                {{-- <button class="btn btn-primary btn-lg btn-block" id="sslczPayBtn" type="submit"
                token=""
                postdata=""
                order=""
                endpoint="{{ url('/pay-via-ajax') }}">Pay Now</button> --}}
                        </form>



                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col-lg-5 -->
            </div><!-- end row -->
        </div><!-- end container -->
</section><!-- end cart-area -->
<!-- ================================
    END CONTACT AREA
================================= -->


@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>






        {{-- <script>
            $(document).ready(function() {
                var paymentData = {
                    name: $('#name').val(),
                    phone: $('#phone').val(),
                    email: $('#email').val(),
                    address: $('#address').val(),
                    total_amount: $('#total').val()
                };

                $('#sslczPayBtn').prop('postdata', paymentData);

                var loadSslCommerzScript = function() {
                    var script = document.createElement("script");
                    script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                    document.getElementsByTagName("head")[0].appendChild(script);
                };

                if (window.addEventListener) {
                    window.addEventListener("load", loadSslCommerzScript, false);
                } else if (window.attachEvent) {
                    window.attachEvent("onload", loadSslCommerzScript);
                }

                // $.ajaxSetup({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //     }
                // });



                $('#sslczPayBtn').click(function(e) {
            e.preventDefault();

            var formData = $('#paymentForm').serialize();

            $.ajax({
                url: "{{ route('pay-via-ajax') }}",
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            });


            });
        </script> --}}




<script>
   
    var obj = {};
    obj.name = $('#name').val();
    obj.phone = $('#phone').val();
    obj.email = $('#email').val();
    obj.address = $('#address').val();
    obj.total_amount = $('#total').val();
    // obj._token = '{{ csrf_token() }}';  // Add CSRF token here

    $('#sslczPayBtn').prop('postdata', obj);

    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            // script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR LIVE
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7); // USE THIS FOR SANDBOX
            tag.parentNode.insertBefore(script, tag);
        };

        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

@extends('frontend.master')
@section('home')

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

                <li>Checkout</li>
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
            <form method="post" action="{{ route('payment') }}" class="row" enctype="multipart/form-data">
                @csrf
                            <div class="input-box col-lg-6">
                                <label class="label-text">Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="name" value="{{ Auth::user()->name }}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-6">
                                <label class="label-text">User Name</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="username" value="{{ Auth::user()->username }}">
                                    <span class="la la-user input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="input-box col-lg-12">
                                <label class="label-text">Email Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="email" name="email" value="{{ Auth::user()->email }}">
                                    <span class="la la-envelope input-icon"></span>
                                </div>
                            </div><!-- end input-box -->
                            <div class="input-box col-lg-12">
                                <label class="label-text">Phone Number</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="phone" value="{{ Auth::user()->phone }}">
                                    <span class="la la-phone input-icon"></span>
                                </div>
                            </div><!-- end input-box -->

                            <div class="input-box col-lg-12">
                                <label class="label-text">Address</label>
                                <div class="form-group">
                                    <input class="form-control form--control" type="text" name="address" value="{{ Auth::user()->address }}">
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
                <div class="card card-item">
                    <div class="card-body">
                        <h3 class="pb-3 card-title fs-22">Select Payment Method</h3>
                        <div class="divider"><span></span></div>
                        <div class="payment-option-wrap">
                            <div class="payment-tab is-active">
                                <div class="payment-tab-toggle">
                                    <input checked="" id="bankTransfer" name="cash_delivery" type="radio" value="handcash">
                                    <label for="bankTransfer">Direct Payment</label>
                                </div>
                                {{-- <div class="payment-tab-content">
                                    <p class="fs-15 lh-24">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                </div> --}}
                            </div>

                            <div class="payment-tab">
                                <div class="payment-tab-toggle">
                                    <input id="stripe" name="cash_delivery" type="radio" value="stripe">
                                    <label for="stripe">Stripe</label>
                                </div>
                            </div>
                            <div class="payment-tab">
                                <div class="payment-tab-toggle">
                                    <input id="ssl" name="cash_delivery" type="radio" value="ssl">
                                    <label for="ssl">SSL Commarce</label>
                                </div>
                            </div>

                            {{-- <div class="payment-tab">
                                <div class="payment-tab-toggle">
                                    <input type="radio" name="cash_delivery" id="creditCart" value="creditCard">
                                    <label for="creditCart">Credit / Debit Card</label>
                                    <img class="payment-logo" src="images/payment-img.png" alt="">
                                </div>
                                <div class="payment-tab-content">
                                    <form action="#" class="row">
                                        <div class="input-box col-lg-6">
                                            <label class="label-text">Name on Card</label>
                                            <div class="form-group">
                                                <input class="pl-3 form-control form--control" type="text" name="cardName" placeholder="Card Name">
                                            </div>
                                        </div>
                                        <div class="input-box col-lg-6">
                                            <label class="label-text">Card Number</label>
                                            <div class="form-group">
                                                <input class="pl-3 form-control form--control" type="text" name="cardNumber" placeholder="1234  5678  9876  5432">
                                            </div>
                                        </div>
                                        <div class="input-box col-lg-4">
                                            <label class="label-text">Expiry Month</label>
                                            <div class="form-group">
                                                <input class="pl-3 form-control form--control" type="text" name="expiryMonth" placeholder="MM">
                                            </div>
                                        </div>
                                        <div class="input-box col-lg-4">
                                            <label class="label-text">Expiry Year</label>
                                            <div class="form-group">
                                                <input class="pl-3 form-control form--control" type="text" name="expiryYear" placeholder="YY">
                                            </div>
                                        </div>
                                        <div class="input-box col-lg-4">
                                            <label class="label-text">CVV</label>
                                            <div class="form-group">
                                                <input class="pl-3 form-control form--control" type="text" name="cvv" placeholder="cvv">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> --}}
                        </div>

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
                        <input type="hidden" name="total" value="{{ $cartTotal }}">
                        @endif


                        <div class="pt-3 btn-box border-top border-top-gray">
                            <p class="mb-2 fs-14 lh-22">Aduca is required by law to collect applicable transaction taxes for purchases made in certain tax jurisdictions.</p>
                            <p class="mb-3 fs-14 lh-22">By completing your purchase you agree to these <a href="#" class="text-color hover-underline">Terms of Service.</a></p>

                            <button type="submit" class="btn theme-btn w-100">Proceed <i class="ml-1 la la-arrow-right icon"></i></button>

                        </div>
                    </div><!-- end card-body -->
                </div><!-- end card -->
            </div><!-- end col-lg-5 -->
        </div><!-- end row -->
    </div><!-- end container -->
</form>
</section>
<!-- ================================
       END CONTACT AREA
================================= -->




@endsection

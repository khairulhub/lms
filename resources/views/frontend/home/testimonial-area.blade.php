@php
    $reviews = App\Models\Review::where('status', 1)->latest()->limit(5)->get();
@endphp
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="text-center section-heading">
            <h5 class="mb-2 ribbon ribbon-lg">Testimonials</h5>
            <h2 class="section__title">Student's Feedback</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
    </div><!-- end container -->
    <div class="container-fluid">

        <div class="testimonial-carousel owl-action-styled">
            @foreach ($reviews as $item)
            <div class="card card-item">
                <div class="card-body">
                    <div class="pb-3 media media-card align-items-center">
                        <div class="media-img avatar-md">
                            <img src="{{ !empty($item->user->photo) ? url('upload/user_image/' . $item->user->photo) : url('upload/noimage.jpg') }}" alt="Testimonial avatar" class="rounded-full">
                        </div>
                        <div class="media-body">
                            <h5>{{ $item->user->name }}</h5>
                            <div class="pt-1 d-flex align-items-center">
                                <span class="pr-2 lh-18">Student</span>
                                <div class="review-stars">
                                    @if ($item->rating == null)
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    @elseif ($item->rating == 1)
                                    <span class="la la-star"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    @elseif ($item->rating == 2)
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    @elseif ($item->rating == 3)
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star-o"></span>
                                    <span class="la la-star-o"></span>
                                    @elseif ($item->rating == 4)
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star-o"></span>
                                    @elseif ($item->rating == 5)
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    <span class="la la-star"></span>
                                    @endif

                                   </div>
                            </div>
                        </div>
                    </div><!-- end media -->
                    <p class="card-text">
                       {{ $item->comment }}
                    </p>
                </div><!-- end card-body -->
            </div><!-- end card -->
            @endforeach
            
        </div><!-- end testimonial-carousel -->
    </div><!-- container-fluid -->
</section><!-- end testimonial-area -->

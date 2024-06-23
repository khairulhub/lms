@php
    $blog = App\Models\BlogPost::latest()->get();
@endphp

<section class="overflow-hidden blog-area section--padding bg-gray">
    <div class="container">
        <div class="text-center section-heading">
            <h5 class="mb-2 ribbon ribbon-lg">News feeds</h5>
            <h2 class="section__title">Latest News & Articles</h2>
            <span class="section-divider"></span>
        </div><!-- end section-heading -->
        <div class="blog-post-carousel owl-action-styled half-shape mt-30px">


            @foreach($blog as $item)
            <div class="card card-item">
                <div class="card-image">
                    <a href="{{url('blog/details/'.$item->post_slug)}}" class="d-block">
                        <img class="card-img-top" src="{{asset($item->post_image)}}" alt="Card image cap">
                    </a>
                    <div class="course-badge-labels">
                        <div class="course-badge">{{$item->created_at->format('M d Y')}}</div>
                    </div>
                </div><!-- end card-image -->
                <div class="card-body">
                    <h5 class="card-title"><a href="{{url('blog/details/'.$item->post_slug)}}">{{$item->post_title}}</a>
                    </h5>
                    <ul
                        class="flex-wrap pt-2 generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center fs-14">
                        <li class="d-flex align-items-center">By<a href="#">TechyDevs</a></li>
                        <li class="d-flex align-items-center"><a href="#">4 Comments</a></li>
                        <li class="d-flex align-items-center"><a href="#">130 Likes</a></li>
                    </ul>
                    <div class="pt-3 d-flex justify-content-between align-items-center">
                        <a href="{{url('blog/details/'.$item->post_slug)}}" class="btn theme-btn theme-btn-sm theme-btn-white">Read More
                            <i class="ml-1 la la-arrow-right icon"></i></a>
                        <div class="share-wrap">
                            <ul class="social-icons social-icons-styled">
                                <li class="mr-0"><a href="#" class="facebook-bg"><i
                                            class="la la-facebook"></i></a></li>
                                <li class="mr-0"><a href="#" class="twitter-bg"><i
                                            class="la la-twitter"></i></a></li>
                                <li class="mr-0"><a href="#" class="instagram-bg"><i
                                            class="la la-instagram"></i></a></li>
                            </ul>
                            <div class="shadow-sm cursor-pointer icon-element icon-element-sm share-toggle"
                                title="Toggle to expand social icons"><i class="la la-share-alt"></i></div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
            @endforeach


        </div><!-- end blog-post-carousel -->
    </div><!-- end container -->
</section><!-- end blog-area -->

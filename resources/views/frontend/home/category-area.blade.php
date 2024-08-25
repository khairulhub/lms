{{-- 
    if you want to access the data form the database without controller in blade that time you need to access the model by php blog here one things limit is a laravel build in function by using this you can see the data in frontend or backend like limit you have 100 data but you want to watch 10 data......
    --}}

    @php
    $category = App\Models\Category::latest()->limit(6)->get();
@endphp

<section class="category-area pb-90px">
    <div class="container">
        <div class="row align-items-center text-center">
            <div class="col-lg-12">
                <div class="category-content-wrap">
                    <div class="section-heading">
                        <h5 class="mb-2 ribbon ribbon-lg">Categories</h5>
                        <h2 class="section__title">Popular Categories</h2>
                        <span class="section-divider"></span>
                    </div><!-- end section-heading -->
                </div>
            </div><!-- end col-lg-9 -->
           
        </div><!-- end row -->
        <div class="category-wrapper mt-30px">
            <div class="row">

                @foreach ($category as  $item)

                @php
                    $course = App\Models\Course::where('category_id',$item->id)->get();
                @endphp
                    
                <div class="col-lg-4 responsive-column-half">
                    <div class="category-item">
                        <img class="cat__img lazy" src="{{ asset($item->photo) }}"
                            data-src="images/img1.jpg" alt="Category image">
                        <div class="category-content">
                            <div class="category-inner">
                                <h3 class="cat__title"><a href="#">{{ $item->category_name }}</a></h3>
                                @if ($course->count() > 0)
                                <p class="cat__meta">{{ $course->count() }}</p>
                            @endif
                                <a href="{{ url('category/'.$item->id.'/'.$item->category_slug) }}" class="btn theme-btn theme-btn-sm theme-btn-white">Explore<i
                                        class="ml-1 la la-arrow-right icon"></i></a>
                            </div>
                        </div><!-- end category-content -->
                    </div><!-- end category-item -->
                </div><!-- end col-lg-4 -->

                @endforeach
            </div><!-- end row -->
        </div><!-- end category-wrapper -->
    </div><!-- end container -->
</section><!-- end category-area -->

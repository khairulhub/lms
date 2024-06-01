{{--  wishlist work start  --}}

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addToWishList(course_id) {
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "/add-to-wishlist/" + course_id,
            success: function(data, textStatus, jqXHR) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 6000
                });

                if (jqXHR.status === 200) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    });
                } else if (jqXHR.status === 409) {
                    Toast.fire({
                        icon: 'error',
                        title: data.error
                    });
                }
            },
            error: function(jqXHR) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 6000
                });

                if (jqXHR.status === 401) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please login first'
                    });
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'This Course has already been added to the wishlist'
                    });
                }
            }
        });
    }
</script>

{{--  wishlist work end --}}


<script type="text/javascript">
   function wishlist(){
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: '/get-wishlish-course/',

        success:function(response){
            $('#wishlistquantity').text(response.wishlistquantity);
            var rows = "";

            $.each(response.wishlist, function(key,value){
                rows += `
                <div class="col-lg-4 responsive-column-half">
            <div class="card card-item">
                <div class="card-image">
                    <a href="/course/details/${value.course.id}/${value.course.course_name_slug}" class="d-block">
                        <img class="card-img-top" src="/${value.course.course_image}" alt="Card image cap">
                    </a>

                </div><!-- end card-image -->
                <div class="card-body">
                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">${value.course.label}</h6>
                    <h5 class="card-title"><a href="/course/details/${value.course.id}/${value.course.course_name_slug}">${value.course.course_name}</a></h5>

                    <div class="d-flex justify-content-between align-items-center">


                        ${value.course.discount_price == null ? `<p class="card-price text-black font-weight-bold">$${value.course.discount_price}</p>` : `<p class="card-price text-black font-weight-bold">$${value.course.discount_price} <span class="before-price font-weight-medium">$${value.course.selling_price}</span></p>` }
                        <div class="icon-element icon-element-sm shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="top" title="Remove from Wishlist" id="${value.id}" onclick="removeWishList(this.id)"><i class="la la-heart"></i></div>
                    </div>
                </div>
            </div>
        </div>   `
            });

         $('#wishlist').html(rows);

        }
    })
   }
   wishlist();





    //    remove WishList
    function removeWishList(id){
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/remove-wishlist/'+id,
            success:function(response){
                wishlist();
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 6000
                });
                Toast.fire({
                    icon: 'success',
                    title: response.success
                });
            }
        })
    }


</script>


{{-- add to cart js  --}}

<script type="text/javascript">
    function addToCart(course_id, course_name, instructor_id, course_name_slug) {
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                _token: '{{csrf_token()}}',
                course_name: course_name,
                course_name_slug: course_name_slug,
                instructor_id: instructor_id
            },
            url: "/cart/data/store/" + course_id,
            success: function(data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 6000
                });
                if (data.success) {
                    Toast.fire({
                        icon: 'success',
                        title: data.success
                    });
                } else if (data.error) {
                    Toast.fire({
                        icon: 'error',
                        title: data.error
                    });
                }
            }
        });
    }
</script>














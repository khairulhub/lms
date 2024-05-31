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
                        title: 'his Course has already been added to the wishlist'
                    });
                }
            }
        });
    }
</script>






{{--  wishlist work end --}}















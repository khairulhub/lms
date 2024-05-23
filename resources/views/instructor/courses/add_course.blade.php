@extends('./instructor.instructor_dashboard')
@section('instructor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">

        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                </ol>
            </nav>
        </div>
        {{-- <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.category') }}" class="px-5 btn btn-primary">Add Category</a>

            </div>
        </div> --}}
    </div>
    <!--end breadcrumb-->


    <div class="row">
        <div class="mx-auto col-xl-10">

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Add
                        Course
                    </h5>
                    <form id="myForm" action="{{ route('store.course') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Course Name</label>
                            <input type="text" class="form-control" id="input1" name="course_name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Course Title</label>
                            <input type="text" class="form-control" id="input1" name="course_title" >
                        </div>


                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Category Image / Photo</label>
                            <input class="form-control" type="file" id="image"  name="course_image">
                        </div>

                       <div class="col-md-6">
                        <img id="showImage" src="{{ url('upload/noimage.jpg') }}"
                                                alt="Admin" class="p-1 mt-2 rounded-circle bg-primary" width="60">
                       </div>


                       <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Course Intro Video</label>
                        <input type="file" class="form-control" id="input1" name="video" accept="video/mp4, video/webm">
                    </div>

                    <div class="form-group col-md-6">

                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Category Name</label>
                        <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="category_id">
                            <option selected="" disabled>Open this select menu</option>
                            @foreach ($categories as $cat )
                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="input1" class="form-label">Sub-Category Name</label>
                        <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="subcategory_id">
                            <option></option>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Certificate</label>
                        <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="certificate">
                            <option selected="" disabled>Open this select menu</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>

                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Course Label</label>
                        <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="label">
                            <option selected="" disabled>Open this select menu</option>
                            <option value="Begginer">Begginer</option>
                            <option value="Middle">Middle</option>
                            <option value="Advance">Advance</option>

                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Course Price</label>
                        <input type="text" class="form-control" id="input1" name="selling_price" >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Discount Price</label>
                        <input type="text" class="form-control" id="input1" name="discount_price" >
                    </div>

                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Duration </label>
                        <input type="text" class="form-control" id="input1" name="duration" >
                    </div>

                    <div class="form-group col-md-4">
                        <label for="input1" class="form-label">Resources</label>
                        <input type="text" class="form-control" id="input1" name="resources" >
                    </div>


                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Prerequisites</label>
                        <textarea name="prerequisites" class="form-control" id="input11" placeholder="Prerequisites ..." rows="3"></textarea>
                    </div>
{{-- id="myeditorinstance"  --}}
                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" placeholder="Description ..." rows="3"></textarea>
                    </div>


                    <p>Course Goal</p>


                     <div class="row add_item">

        <div class="col-md-6">
              <div class="mb-3">
                    <label for="goals" class="form-label"> Goals </label>
                    <input type="text" name="course_goals[]" id="goals" class="form-control" placeholder="Goals ">
              </div>
        </div>
        <div class="form-group col-md-6" style="padding-top: 30px;">
              <a class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i> Add More..</a>
        </div>
 </div> <!---end row-->



                    <hr>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="bestseller" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Best Seller
                                </label>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="featured" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Featured
                                </label>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="highestrated" value="1" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Highest Rated
                                </label>
                              </div>
                        </div>
                    </div>



                        <div class="col-md-12">
                            <div class="gap-3 d-md-flex d-grid align-items-center">
                                <button type="submit" class="px-4 btn btn-primary">Submit</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>




        </div>
    </div>



</div>
<!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
   <div class="whole_extra_item_add" id="whole_extra_item_add">
      <div class="whole_extra_item_delete" id="whole_extra_item_delete">
         <div class="container mt-2">
            <div class="row">


               <div class="form-group col-md-6">
                  <label for="goals">Goals</label>
                  <input type="text" name="course_goals[]" id="goals" class="form-control" placeholder="Goals  ">
               </div>
               <div class="form-group col-md-6" style="padding-top: 20px">
                  <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                  <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle">Remove</i></span>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


<!----For Section-------->
<script type="text/javascript">
   $(document).ready(function(){
      var counter = 0;
      $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
      });
      $(document).on("click",".removeeventmore",function(event){
            $(this).closest("#whole_extra_item_delete").remove();
            counter -= 1
      });
   });
</script>
<!--========== End of add multiple class with ajax ==============-->


<script type="text/javascript">

    $(document).ready(function(){
        $('select[name="category_id"]').on('change', function(){
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    dataType:"json",
                    success:function(data){
                        $('select[name="subcategory_id"]').html('');
                        var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id + '">' + value.subcategory_name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });
    });

</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                course_name: {
                    required : true,
                },
                course_title: {
                    required : true,
                },
                course_image: {
                    required : true,
                },
                video: {
                    required : true,
                },
                category_id: {
                    required : true,
                },
                subcategory_id: {
                    required : true,
                },
                certificate: {
                    required : true,
                },
                label: {
                    required : true,
                },
                selling_price: {
                    required : true,
                },
                discount_price: {
                    required : true,
                },
                duration: {
                    required : true,
                },
                resources: {
                    required : true,
                },
                prerequisites: {
                    required : true,
                },
                description: {
                    required : true,
                },

            },
            messages :{
                course_name: {
                    required : 'Please Enter Course Name',
                },
                course_title: {
                    required : 'Please Enter Course Title',
                },
                course_image: {
                    required : 'Please Select Photo',
                },
                video: {
                    required : 'Please Select Video',
                },
                category_id: {
                    required : 'Please Select Category Name',
                },
                subcategory_id: {
                    required : 'Please Select SubCategory Name',
                },
                certificate: {
                    required : 'Please Select Certificate Option',
                },
                label: {
                    required : 'Please Select label Option',
                },
                selling_price: {
                    required : 'Please Select Course price',
                },
                discount_price: {
                    required : 'Please Select Discount Price',
                },
                duration: {
                    required : 'Please Select Duration Time',
                },
                resources: {
                    required : 'Please Select Resources',
                },
                prerequisites: {
                    required : 'Please Select Prerequisites',
                },
                description: {
                    required : 'Please Select Description ',
                },
                label: {
                    required : 'Please Select label Option',
                },


            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });

</script>

@endsection

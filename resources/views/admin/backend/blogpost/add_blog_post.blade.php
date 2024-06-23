@extends('./admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
   
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Blog Post</li>
                </ol>
            </nav>
        </div>
        
    </div>
    <!--end breadcrumb-->
    

    <div class="row">
        <div class="mx-auto col-xl-10">
            
            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Add 
                        Blog Post
                    </h5>
                    <form id="myForm" action="{{ route('store.blog.post') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Post Title</label>
                            <input  type="text" class="form-control" id="input1" name="post_title" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Blog Category Name</label>
                            <select name="blogcat_id" class="mb-3 form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                @foreach ($blogCat as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Blog Category Name</label>
                            <textarea class="form-control" name="long_description" id="summernote"  placeholder="Address ..." rows="3"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Blog Post Tags</label>
                            <input type="text" name="post_tags" class="form-control" data-role="tagsinput" value="jQuery">
                        </div>
                        <div class="form-group col-md-6"></div>
                       
                        <div class="form-group col-md-6">
                            <label for="post_image" class="form-label">Category Image / Photo</label>
                            <input class="form-control" type="file" id="post_image"  name="post_image">
                        </div>
                        
                       <div class="col-md-6">
                        <img id="showImage" src="{{ url('upload/noimage.jpg') }}"
                                                alt="Admin" class="p-1 mt-2 rounded-circle bg-primary" width="60">
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





<script type="text/javascript">
    $(document).ready(function() {
        $('#post_image').change(function(e) {
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
                post_title: {
                    required : true,
                }, 
                blogcat_id: {
                    required : true,
                }, 
                post_image: {
                    required : true,
                }, 
                
            },
            messages :{
                post_title: {
                    required : 'Please Enter Post Title',
                }, 
                blogcat_id: {
                    required : 'Please Select Blog Category Name',
                }, 
                post_image: {
                    required : 'Please Select post_image',
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
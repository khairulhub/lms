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
                    <li class="breadcrumb-item active" aria-current="page">Add Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    

    <div class="row">
        <div class="mx-auto col-xl-10">
            
            <div class="card">
                <div class="p-4 card-body">
                    
                    <form id="myForm" action="{{ route('store.admindata') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="input1" name="name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="input1" name="username" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Email</label>
                            <input type="text" class="form-control" id="input1" name="email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="input1" name="phone" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Address</label>
                            <input type="text" class="form-control" id="input1" name="address" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="input1" name="password" >
                        </div>
                       
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Role</label>
                            <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="role">
                                <option selected="" disabled>Open this select menu</option>
                              @foreach ($roles as $role)
                              <option value="{{ $role->id }}">{{ $role->name }}</option>
                              @endforeach
                            </select>
                        </div>
                        
                        {{-- <div class="my-3 row">
                            <div class="col-sm-9">
                                <h6 class="mb-2">Profile Image</h6>
                                <input id="image" type="file" name="photo" class="form-control" />
                            </div>
                            <div class="col-sm-3 text-secondary">
                               
                                <img id="showImage"
                                    src="{{ !empty($profileData->photo) ? url('upload/admin_image/' . $profileData->photo) : url('upload/noimage.jpg') }}"
                                    alt="Admin" class="p-1 mt-2 rounded-circle bg-primary" width="60">
                            </div>

                        </div> --}}
                       
                        
                    
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
                category_id: {
                    required : true,
                }, 
                subcategory_name: {
                    required : true,
                }, 
                
            },
            messages :{
                category_id: {
                    required : 'Please select Category Name',
                }, 
                subcategory_name: {
                    required : 'Please Select sub category name',
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
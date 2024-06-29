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
                    <li class="breadcrumb-item active" aria-current="page">Add Permission</li>
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
                        Permission
                    </h5>
                    <form id="myForm" action="{{ route('store.permission') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Permission Name</label>
                            <input type="text" class="form-control" id="input1" name="name" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Group Name</label>
                            <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="group_name">
                                <option selected="" disabled>Open this select menu</option>
                              
                                <option value="Category">Category</option>
                                <option value="Instructor">Instructor</option>
                                <option value="Coupon">Coupon</option>
                                <option value="Setting">Setting</option>
                                <option value="Orders">Orders</option>
                                <option value="Report">Report</option>
                                <option value="Review">Review</option>
                                <option value="All User">All User</option>
                                <option value="Blog">Blog</option>
                                <option value="Role and Permission">Role and Permission</option>
                                
                           
                            
                            </select>
                        </div>
                        
                        <div class="col-md-6">
                            
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




{{-- 
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
</script> --}}



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
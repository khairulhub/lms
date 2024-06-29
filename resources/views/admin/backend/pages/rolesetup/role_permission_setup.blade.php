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
                    <li class="breadcrumb-item active" aria-current="page">Add Role In Permission</li>
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
                        Role In Permission
                    </h5>
                    <form id="myForm" action="{{ route('store.permission') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Roles Name</label>
                            <select class="mb-3 form-select col-md-6" aria-label="Default select example" name="group_name">
                                <option selected="" disabled>Open Roles from select menu</option>
                              @foreach ($roles as $item)  
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="flexCheckMain" name="permission_all" value="1">
                            <label class="form-check-label" for="flexCheckMain">Select All Permission</label>
                        </div>
                        <hr>

                        @foreach ($permission_group as $group)
    <div class="row">
        <div class="col-md-3">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkGroup{{ $group->group_name }}" name="permission_all" value="1">
                <label class="form-check-label" for="checkGroup{{ $group->group_name }}">{{ $group->group_name }}</label>
            </div>
        </div>
        <div class="col-md-9">
            @php
                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
            @endphp
            @foreach ($permissions as $permission)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="checkDefault{{ $permission->id }}" name="permission[]" value="{{ $permission->id }}">
                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                </div>
            @endforeach
            <br>
           
        </div>
        <hr>
    </div>
@endforeach
                       
                     
                      
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

<script>
    $('#flexCheckMain').click(function(){
        if ($(this).is(':checked')) {
            $('input[type=checkbox]').prop('checked',true);
        }else{
            $('input[type=checkbox]').prop('checked',false);
        }
    });
</script>

@endsection
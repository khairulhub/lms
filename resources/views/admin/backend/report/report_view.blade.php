@extends('./admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
   
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
                </ol>
            </nav>
        </div>
       
    </div>
    <!--end breadcrumb-->
    

    <div class="row">
        <div class="mx-auto col-xl-10">
            
            <div class="card">
                <div class="p-4 card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form id="myForm" action="{{ route('admin.search.by.date') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="input1" class="form-label">Search By Date</label>
                                    <input type="date" class="form-control" id="input1" name="date" >
                                </div>
                                <div class="col-md-12">
                                    <div class="gap-3 d-md-flex d-grid align-items-center">
                                        <button type="submit" class="px-4 btn btn-primary">Submit</button>
                                        
                                    </div>
                                </div>
               
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form id="myForm" action="{{ route('admin.search.by.month') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="gap-2 d-flex col-md-12">
                                    <div class="form-group col-md-6">
                                        <label for="input1" class="form-label">Search By Month</label>
                                        <select name="month" class="mb-3 form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            <option value="january">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="input1" class="form-label">Search By Year</label>
                                        <select name="year_name" class="mb-3 form-select" aria-label="Default select example">
                                            <option selected="">Open this select menu</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="gap-3 d-md-flex d-grid align-items-center">
                                    <button type="submit" class="px-4 btn btn-primary">Submit</button>
                                    
                                </div>
               
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form id="myForm" action="{{ route('admin.search.by.year') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group col-md-12">
                                    <label for="input1" class="form-label">Search By Year</label>
                                    <select name="year" class="mb-3 form-select" aria-label="Default select example">
                                        <option selected="">Open this select menu</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                    </select>
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
    </div>


   
</div>








<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                cupon_name: {
                    required : true,
                }, 
                cupon_discount: {
                    required : true,
                }, 
                
            },
            messages :{
                cupon_name: {
                    required : 'Please Enter Cupon Name',
                }, 
                cupon_discount: {
                    required : 'Please Select cupon discount',
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
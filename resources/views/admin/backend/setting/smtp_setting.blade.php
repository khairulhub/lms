@extends('./admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
   
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Smtp Settings</li>
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
                    <h5 class="mb-4">Edit 
                        Smtp Setting
                    </h5>
                    <form id="myForm" action="{{ route('update.smtpsetting') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id"  value="{{ $smtps-> id}}" >

                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL MAILER</label>
                            <input type="text" class="form-control" id="input1" name="mailer" value="{{ $smtps-> mailer}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL HOST</label>
                            <input type="text" class="form-control" id="input1" name="host" value="{{ $smtps-> host}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL PORT </label>
                            <input type="text" class="form-control" id="input1" name="port" value="{{ $smtps-> port}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL USERNAME</label>
                            <input type="text" class="form-control" id="input1" name="username" value="{{ $smtps-> username}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL PASSWORD</label>
                            <input type="text" class="form-control" id="input1" name="password" value="{{ $smtps-> password}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL ENCRYPTION</label>
                            <input type="text" class="form-control" id="input1" name="encryption" value="{{ $smtps-> encryption}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">MAIL FROM_ADDRESS</label>
                            <input type="text" class="form-control" id="input1" name="from_address" value="{{ $smtps-> from_address}}" >
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


@endsection
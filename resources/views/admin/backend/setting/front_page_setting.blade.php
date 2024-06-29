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
                    <li class="breadcrumb-item active" aria-current="page">Edit Site Settings</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->


    <div class="row">
        <div class="mx-auto col-xl-10">

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Edit
                        Smtp Setting
                    </h5>
                    <form id="myForm" action="{{ route('update.siteSettings') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" id="id" name="id"  value="{{ $frontpage-> id}}" >







                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Phone</label>
                            <input type="text" class="form-control" id="input1" name="phone" value="{{ $frontpage-> phone}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Email </label>
                            <input type="text" class="form-control" id="input1" name="email" value="{{ $frontpage-> email}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Address</label>
                            <input type="text" class="form-control" id="input1" name="address" value="{{ $frontpage-> address}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Watch Preview</label>
                            <input type="text" class="form-control" id="input1" name="watch_preview" value="{{ $frontpage-> watch_preview}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Facebook</label>
                            <input type="text" class="form-control" id="input1" name="facebook" value="{{ $frontpage-> facebook}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Twitter</label>
                            <input type="text" class="form-control" id="input1" name="twitter" value="{{ $frontpage-> twitter}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Instagram</label>
                            <input type="text" class="form-control" id="input1" name="instagram" value="{{ $frontpage-> instagram}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site LinkedIn</label>
                            <input type="text" class="form-control" id="input1" name="linkedin" value="{{ $frontpage-> linkedin}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Copy Right Text</label>
                            <input type="text" class="form-control" id="input1" name="copyright" value="{{ $frontpage-> copyright}}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Site Currency</label>
                            <input type="text" class="form-control" id="input1" name="currency" value="{{ $frontpage-> currency}}" >
                        </div>





                        <div class="form-group col-md-6">
                            <label for="image" class="form-label">Site Logo</label>
                            <input class="form-control" type="file" id="image"  name="logo">
                        </div>

                       <div class="col-md-6">
                        <img id="showImage" src="{{ url('upload/noimage.jpg') }}"
                                                alt="Admin" class="p-1 mt-2 rounded bg-primary" width="120">
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
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

@endsection

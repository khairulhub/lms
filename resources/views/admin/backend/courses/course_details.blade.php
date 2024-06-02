@extends('./admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="page-content">
        <!--breadcrumb-->
        <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
            {{-- <div class="breadcrumb-title pe-3">User Profile</div> --}}
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="p-0 mb-0 breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Course Details</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <img src="{{asset($course->course_image)}}" class="rounded-circle p-1 border" width="90" height="90" alt="...">
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mt-0">{{$course->course_name}}</h5>
                                <p class="mb-0">{{ $course->course_title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
							<div class="card-body">
								<table class="table mb-0">
									
									<tbody>
										<tr>
											<th ><strong>Category :</strong> </th>
											<td>{{ $course['category']['category_name'] }}</td>
											
										</tr>
										<tr>
											<th ><strong>SubCategory :</strong> </th>
											<td>{{ $course['subcategory']['subcategory_name'] }}</td>
											
										</tr>
										<tr>
											<th ><strong>Instructor :</strong> </th>
											<td>{{ $course['user']['name'] }}</td>
											
										</tr>
										<tr>
											<th ><strong>Label :</strong> </th>
											<td>{{ $course->label }}</td>
											
										</tr>
										<tr>
											<th ><strong>Duration :</strong> </th>
											<td>{{ $course->duration }}</td>
											
										</tr>
										
										<tr>
											<th ><strong>Video :</strong> </th>
											<td>
                                                <video height="200" width="300" controls>
                                                    <source src="{{ asset($course->video) }}" type="video/mp4">
                                                </video>
                                            </td>
											
										</tr>
										
										
									</tbody>
								</table>
							</div>
						</div>
                    </div>
                    <div class="col-lg-6">

                            <div class="card">
                                <div class="card-body">
                                    <table class="table mb-0">
                                        
                                        <tbody>
                                            <tr>
                                                <th ><strong>Resources :</strong> </th>
                                                <td>{{ $course->resources }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th ><strong>Certificate :</strong> </th>
                                                <td>{{ $course->certificate }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th ><strong>Selling Price :</strong> </th>
                                                <td>{{ $course->selling_price }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th ><strong>Discount Price :</strong> </th>
                                                <td>{{ $course->discount_price }}</td>
                                                
                                            </tr>
                                            <tr>
                                                <th ><strong>Status :</strong> </th>
                                                <td>
                                                    @if ($course->status == 1)
                                                        <span class="badge bg-success">Active</span>
                                                        @elseif($course->status == 0)
                                                        <span class="badge bg-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                                <th ><strong>course Image :</strong> </th>
                                                <td>
                                                    <img src="{{ asset($course->course_image) }}" alt="" width="300" height="200">
                                                </td>
                                                
                                            </tr>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- select image show in the img  --}}


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

@extends('./instructor.instructor_dashboard')
@section('instructor')


<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        {{-- <div class="breadcrumb-title pe-3">All Category</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Course</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.course') }}" class="px-5 btn btn-primary">Add Course</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Course Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Category </th>
                            <th>Price</th>
                            <th>Discount</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><img src="{{ asset($item->course_image) }}" alt="" class="img-fluid" width="50" height="50"></td>
                            <td>{{ $item->course_name }}</td>
                            <td>{{ $item['category']['category_name'] }}</td>
                            <td>{{ $item->selling_price }}</td>
                            <td>{{ $item->discount_price }}</td>


                            <td>
                                <div class="gap-2 btn-group">
                                    <a href="{{ route('edit.course', $item->id) }}" class="px-2 btn btn-success" title="Edit"><i class="lni lni-eraser"></i></a>
                                    <a href="{{ route('delete.course', $item->id) }}" class="px-2 btn btn-danger" id="delete" title="Delete"><i class="lni lni-trash"></i></a>
                                    <a href="{{ route('add.course.lecture', $item->id) }}" class="px-2 text-white btn btn-warning" title="Lecture"><i class="lni lni-list"></i></a>

                                </div>
                            </td>
 
                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

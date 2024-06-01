@extends('./admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-courses-center">
        {{-- <div class="breadcrumb-title pe-3">All Category</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-course"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-course active" aria-current="page">All Courses</li>
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
                            <th>Instructor</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $key=> $course)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>
                                <img src="{{ asset($course->course_image) }}" alt="" class="img-fluid" width="40">
                            </td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course['user']['name'] }}</td>
                            <td>{{ $course['category']['category_name'] }}</td>
                            <td>
                                @if ($course->discount_price == Null)
                                {{ $course->selling_price }}
                                @else
                                {{ $course->discount_price }}
                                @endif
                            </td>
                            <td>
                                @if($course->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @elseif($course->status == 0)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('edit.category', $course->id) }}" class=" btn btn-success"><i class="lni lni-eye"></i></a>
                            </td>

                            <td>
                                <form id="statusForm{{ $course->id }}" action="{{ route('update.coursestatus') }}" method="POST">
                                    @csrf
                                   
                                    <input type="hidden" name="course_id" value="{{ $course->id }}">
                <input type="hidden" name="is_checked" value="{{ $course->status }}">
                <div class="form-check form-switch">
                    <input class="form-check-input status-toggle" type="checkbox" {{ $course->status == 1 ? 'checked' : '' }} onchange="updateStatus({{ $course->id }}, this)">
                </div>
                                </form>
                            </td>




                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>

@endsection

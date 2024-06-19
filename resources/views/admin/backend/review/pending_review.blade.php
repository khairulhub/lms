@extends('./admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        {{-- <div class="breadcrumb-title pe-3">All Category</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Pending Review</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Review Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Course Name</th>
                            <th>User Name</th>
                            <th>Comment</th>
                            <th>Rating</th>

                            <th>Status</th>



                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($review as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $item['course']['course_name'] }}</td>
                            <td>{{ $item['user']['name'] }}</td>
                            <td>{{ $item->comment }}</td>
                            <td>
                                @if ($item->rating == Null)
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                @elseif($item->rating == 1)
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                @elseif($item->rating == 2)
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                @elseif($item->rating == 3)
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                @elseif($item->rating == 4)
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-secondary"></i>
                                @elseif($item->rating == 5)
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                <i class="bx bxs-star text-warning"></i>
                                @endif
                            </td>

                            <td>
                                @if($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <form id="statusForm{{ $item->id }}" action="{{ route('update.review.status') }}" method="POST">
                                    @csrf

                                    <input type="hidden" name="review_id" value="{{ $item->id }}">
                                     <input type="hidden" name="is_checked" value="{{ $item->status }}">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input status-toggle" type="checkbox" {{ $item->status == 1 ? 'checked' : '' }} onchange="updatePendingStatus({{ $item->id }}, this)">
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

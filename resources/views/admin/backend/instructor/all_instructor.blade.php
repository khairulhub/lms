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
                    <li class="breadcrumb-item active" aria-current="page">All Instuctor</li>
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
    <h6 class="mb-0 text-uppercase">Instructor Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Instructor Name</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>



                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allinstructor as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $item->name }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                @if($item->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @elseif($item->status == 0)
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <form id="statusForm{{ $item->id }}" action="{{ route('update.userstatus') }}" method="POST">
                                    @csrf
                                   
                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                <input type="hidden" name="is_checked" value="{{ $item->status }}">
                <div class="form-check form-switch">
                    <input class="form-check-input status-toggle" type="checkbox" {{ $item->status == 1 ? 'checked' : '' }} onchange="updateStatus({{ $item->id }}, this)">
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

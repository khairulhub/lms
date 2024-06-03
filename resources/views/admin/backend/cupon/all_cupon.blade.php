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
                    <li class="breadcrumb-item active" aria-current="page">All Cupons</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.category') }}" class="px-5 btn btn-primary">Add Cupon</a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Cupon Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Cupon Name</th>
                            <th>Cupon Discount</th>
                            <th>Cupon Validity</th>
                            <th>Cupon Status</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cupons as $key=> $cupon)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            
                            <td>{{ $cupon->cupon_name }}</td>
                            <td>{{ $cupon->cupon_discount }}</td>
                            <td>{{ $cupon->cupon_validity }}</td>


                            <td>
                                <div class="gap-2 btn-group">
                                    <a href="{{ route('edit.category', $cupon->id) }}" class="px-5 btn btn-success">Edit</a>
                                    <a href="{{ route('delete.category', $cupon->id) }}" class="px-5 btn btn-danger" id="delete">Delete</a>

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

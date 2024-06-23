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
                    <li class="breadcrumb-item active" aria-current="page">All Blog Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Blog Category</button>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <h6 class="mb-0 text-uppercase">Category Table</h6>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            {{-- <th>Image</th> --}}
                            <th>Category Name</th>
                            <th>Category Slug</th>


                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $key=> $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            {{-- <td><img src="{{ asset($item->photo) }}" alt="" class="img-fluid" width="50" height="50"></td> --}}
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->category_slug }}</td>


                            <td>
                                <div class="gap-2 btn-group">
                                    <button type="button" class="px-5 btn btn-success" data-bs-toggle="modal" data-bs-target="#category" id="{{ $item->id }}" onclick="categoryEdit(this.id)">Edit</button>


                                    <a href="{{ route('delete.blog.category', $item->id) }}" class="px-5 btn btn-danger" id="delete">Delete</a>

                                </div>
                            </td>

                        </tr>
                        @endforeach

                </table>
            </div>
        </div>
    </div>

</div>

{{-- //modal for blog category create --}}

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
              
            </div>
            <div class="modal-body">
                <form action="{{ route('blog.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Blog Category Name</label>
                        <input type="text" class="form-control" id="input1" name="category_name" >
                    </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>
{{-- //modal for blog category create --}}

<div class="modal fade" id="category" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
              
            </div>
            <div class="modal-body">
                <form action="{{ route('blog.category.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="cat_id" id="cat_id">
                    <div class="form-group col-md-12">
                        <label for="input1" class="form-label">Blog Category Name</label>
                        <input type="text" class="form-control" id="cat" name="category_name" >
                    </div>
                
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
        </div>
    </div>
</div>


<script>
    function categoryEdit(id){
        $.ajax({
            type: "GET",
            url: "/edit/blog/category/"+id,
            dataType: "JSON",
            success: function (data) {
                console.log(data);
                $('#cat').val(data.category_name);
                $('#cat_id').val(data.id);
                $('#category').modal('toggle');
            }
            })
    }
</script>

@endsection

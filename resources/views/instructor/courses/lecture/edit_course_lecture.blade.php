@extends('./instructor.instructor_dashboard')
@section('instructor')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="mb-3 page-breadcrumb d-none d-sm-flex align-items-center">
        {{-- <div class="breadcrumb-title pe-3">All Category</div> --}}
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="p-0 mb-0 breadcrumb">
                    <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Lecture</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.course.lecture',['id'=>$lecture->course_id]) }}" class="px-5 btn btn-primary">Back </a>

            </div>
        </div>
    </div>
    <!--end breadcrumb-->


    <div class="row">
        <div class="mx-auto col-xl-10">

            <div class="card">
                <div class="p-4 card-body">
                    <h5 class="mb-4">Edit
                        Lecture
                    </h5>
                    <form id="myForm" action="{{ route('update.course.lecture') }}" method="POST" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $lecture->id }}">
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Lecture Title</label>
                            <input type="text" class="form-control" id="input1" name="lecture_title" value="{{ $lecture->lecture_title }}" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="input1" class="form-label">Video URL</label>
                            <input type="text" class="form-control" id="input1" name="url" value="{{ $lecture->url }}" >
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Lecture Content</label>
                           <textarea name="content" id="" class="form-control"> {{ $lecture->content }}</textarea>
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
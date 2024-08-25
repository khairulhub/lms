@php
 $allinstructor = App\Models\User::where('role','instructor')->latest()->get();
 $totalOrders = App\Models\Order::get();
 $setting = App\Models\SiteSetting::find(1);
 $totalAmount = App\Models\Payment::sum('total_amount');//need to change for count amount
 $totalStudents  = App\Models\User::where('role','user')->latest()->get();
 $totalInstructor  = App\Models\User::where('role','instructor')->latest()->get();
 $courses = App\Models\Course::withCount('orders')->get();


    $courseNames = $courses->pluck('course_title')->toArray();
    $courseCounts = $courses->pluck('orders_count')->toArray();
@endphp

@extends('./admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Orders</p>
                                <h4 class="my-1 text-info">{{count($totalOrders)}}</h4>
                                {{-- <p class="mb-0 font-13">+2.5% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-blues ms-auto"><i
                                    class='bx bxs-cart'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Amount</p>
                                <h4 class="my-1 text-danger">{{$setting->currency}}{{$totalAmount}}</h4>
                                {{-- <p class="mb-0 font-13">+5.4% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-burning ms-auto">
                                <i class='bx bxs-wallet'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Students </p>
                            <h4 class="my-1 text-success">{{count($totalStudents)}}</h4>
                                {{-- <p class="mb-0 font-13">-4.5% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-ohhappiness ms-auto">
                                <i class='bx bxs-bar-chart-alt-2'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="border-0 border-4 card radius-10 border-start border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Customers</p>
                                <h4 class="my-1 text-warning">{{count($totalInstructor)}}</h4>
                                {{-- <p class="mb-0 font-13">+8.4% from last week</p> --}}
                            </div>
                            <div class="text-white widgets-icons-2 rounded-circle bg-gradient-orange ms-auto">
                                <i class='bx bxs-group'></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-lg-8 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Recent Orders</h6>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i
                                        class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a>
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sl</th>
                                        <th>Instructor Name</th>
                                        
                                        <th>Email</th>
                                        <th>Phone</th>
                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($allinstructor as $key=> $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
            
                                        <td>{{ $item->name }}</td>
                                       
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        
            
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

                    <div class="card-body">
                        {{-- <div class="gap-2 mb-3 d-flex align-items-center ms-auto font-13">
                            <span class="px-1 border rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                    style="color: #14abef"></i>Sales</span>
                            <span class="px-1 border rounded cursor-pointer"><i class="bx bxs-circle me-1"
                                    style="color: #ffc107"></i>Visits</span>
                        </div> --}}
                        <div class="chart-container-1 d-none">
                            <canvas id="chart1"></canvas>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex">
                <div class="card radius-10 w-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div>
                                <h6 class="mb-0">Trending Course</h6>
                            </div>
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container-2">
                            <canvas id="chart2"></canvas>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($courses as $course)
                                <li class="bg-transparent list-group-item d-flex justify-content-between align-items-center border-top">
                                    {{ $course->course_title }} <span class="badge bg-success rounded-pill">{{ $course->orders_count }}</span>
                                </li>
                            @endforeach

                    </ul>
                </div>
            </div>
        </div><!--end row-->

       





    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx2 = document.getElementById('chart2').getContext('2d');

        var gradientStroke1 = ctx2.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, '#fc4a1a');
        gradientStroke1.addColorStop(1, '#f7b733');

        var gradientStroke2 = ctx2.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, '#4776e6');
        gradientStroke2.addColorStop(1, '#8e54e9');

        var gradientStroke3 = ctx2.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, '#ee0979');
        gradientStroke3.addColorStop(1, '#ff6a00');

        var gradientStroke4 = ctx2.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, '#42e695');
        gradientStroke4.addColorStop(1, '#3bb2b8');

        var courseNames = @json($courseNames);
        var courseCounts = @json($courseCounts);

        var myChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: courseNames,
                datasets: [{
                    backgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4
                    ],
                    hoverBackgroundColor: [
                        gradientStroke1,
                        gradientStroke2,
                        gradientStroke3,
                        gradientStroke4
                    ],
                    data: courseCounts,
                    borderWidth: [1, 1, 1, 1]
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: 82,
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });

        // Repeat for other charts if needed
    });
</script>

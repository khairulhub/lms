<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
{{-- ================================= Manage Category ================================--}}
    @if(Auth::user()->can('category.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Category</div>
            </a>
            <ul>
                @if(Auth::user()->can('category.all'))
                <li> <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>
                    @endif
                @if(Auth::user()->can('subcategory.all'))
                <li> <a href="{{ route('all.subcategory') }}"><i class='bx bx-radio-circle'></i>All Sub Category</a>
                </li>
                    @endif

            </ul>
        </li>
        @endif
{{-- ================================= Manage INstructor ================================--}}
    @if(Auth::user()->can('instructor.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Instructor</div>
            </a>
            <ul>
            @if(Auth::user()->can('instructor.all'))
                <li> <a href="{{ route('all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor</a>
                </li>
            @endif

            </ul>
        </li>
    @endif
{{-- ================================= Manage Course ================================--}}
        @if(Auth::user()->can('course.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Courses</div>
            </a>
            <ul>
                @if(Auth::user()->can('course.all'))
                <li> <a href="{{ route('admin.all.courses') }}"><i class='bx bx-radio-circle'></i>All Course</a>
                </li>
                @endif

            </ul>
        </li>
        @endif
{{-- ================================= Manage Cupon ================================--}}

    @if(Auth::user()->can('cupon.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Cupon</div>
            </a>
            <ul>
                @if(Auth::user()->can('course.all'))
                <li> <a href="{{ route('admin.all.cupon') }}"><i class='bx bx-radio-circle'></i>All Cupons</a>
                </li>
                @endif

            </ul>
        </li>
    @endif
{{-- ================================= Manage Order ================================--}}

    @if(Auth::user()->can('order.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Orders</div>
            </a>
            <ul>
                @if(Auth::user()->can('order.pending'))
                <li> <a href="{{ route('admin.pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Order</a>
                </li>
                @endif
                @if(Auth::user()->can('order.confirm'))
                <li> <a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a>
                </li>
                @endif
            </ul>
        </li>
    @endif
        {{-- ================================= Manage Report ================================--}}

        @if(Auth::user()->can('report.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Report</div>
            </a>
            <ul>
                @if(Auth::user()->can('report.view'))
                <li> <a href="{{ route('admin.all.report.view') }}"><i class='bx bx-radio-circle'></i>Report View</a>
                </li>
                @endif

            </ul>
        </li>
        @endif
        {{-- ================================= Manage Review ================================--}}

        @if(Auth::user()->can('review.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Review</div>
            </a>
            <ul>
                @if(Auth::user()->can('review.pending'))
                <li> <a href="{{ route('admin.pending.review') }}"><i class='bx bx-radio-circle'></i>Pending Review </a>
                </li>
                @endif
                @if(Auth::user()->can('review.active'))
                <li> <a href="{{ route('admin.active.review') }}"><i class='bx bx-radio-circle'></i>Active Review </a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        {{-- ================================= Manage User ================================--}}
        @if(Auth::user()->can('all.user.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage All Users</div>
            </a>
            <ul>
                @if(Auth::user()->can('all.user'))
                <li> <a href="{{ route('admin.all.users') }}"><i class='bx bx-radio-circle'></i>All Users </a>
                </li>
                @endif
                @if(Auth::user()->can('all.instructor'))
                <li> <a href="{{ route('admin.all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor </a>
                </li>
                @endif

            </ul>
        </li>
        @endif
        {{-- ================================= Manage Blogs ================================--}}
        @if(Auth::user()->can('blog.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Blogs</div>
            </a>
            <ul>
                @if(Auth::user()->can('blog.category'))
                <li> <a href="{{ route('blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Category </a>
                </li>
                @endif
                @if(Auth::user()->can('blog.post'))
                <li> <a href="{{ route('blog.posts') }}"><i class='bx bx-radio-circle'></i>Blog Posts </a>
                </li>
                @endif


            </ul>
        </li>
        @endif
        {{-- ================================= Manage Settings ================================--}}

        @if(Auth::user()->can('setting.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Settings</div>
            </a>
            <ul>
                @if(Auth::user()->can('site.setting'))
                <li> <a href="{{ route('admin.frontend.sitesettings') }}"><i class='bx bx-radio-circle'></i>Site Settings</a>
                </li>

                @endif
                @if(Auth::user()->can('all.smtp'))
                <li> <a href="{{ route('admin.all.smtp') }}"><i class='bx bx-radio-circle'></i>All Smtp</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        {{-- ================================= Manage Role & permission ================================--}}

        @if(Auth::user()->can('rolepermission.menu'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Role & Permission</div>
            </a>
            <ul>
                @if(Auth::user()->can('all.permission'))
                <li> <a href="{{ route('admin.all.permission') }}"><i class='bx bx-radio-circle'></i>All Permissions</a>
                </li>
                @endif
                @if(Auth::user()->can('all.role'))
                <li> <a href="{{ route('admin.all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a>
                </li>
                @endif
                @if(Auth::user()->can('role.in.permission'))
                <li> <a href="{{ route('admin.role.permission') }}"><i class='bx bx-radio-circle'></i>Role In Permission</a>
                </li>
                @endif

                @if(Auth::user()->can('all.role.permission'))
                <li> <a href="{{ route('admin.all.role.permission') }}"><i class='bx bx-radio-circle'></i>All Role In Permission</a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        {{-- ================================= Manage All Admin ================================--}}
        @if(Auth::user()->can('manage.admin'))
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Admin</div>
            </a>
            <ul>

                @if(Auth::user()->can('manage.all.admin'))
                <li> <a href="{{ route('manage.all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a>
                </li>
                @endif
            </ul>
        </li>
        @endif
        {{-- ================================= Manage All Admin ================================--}}








        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class='bx bx-radio-circle'></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class='bx bx-radio-circle'></i>Product
                        Details</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Components</div>
            </a>
            <ul>
                <li> <a href="component-alerts.html"><i class='bx bx-radio-circle'></i>Alerts</a>
                </li>
                <li> <a href="component-accordions.html"><i class='bx bx-radio-circle'></i>Accordions</a>
                </li>


            </ul>
        </li>



        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class='bx bx-radio-circle'></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class='bx bx-radio-circle'></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class='bx bx-radio-circle'></i>Highcharts</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-map-alt"></i>
                </div>
                <div class="menu-title">Maps</div>
            </a>
            <ul>
                <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                </li>
                <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                </li>
            </ul>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-menu"></i>
                </div>
                <div class="menu-title">Menu Levels</div>
            </a>
            <ul>
                <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level One</a>
                    <ul>
                        <li> <a class="has-arrow" href="javascript:;"><i class='bx bx-radio-circle'></i>Level
                                Two</a>
                            <ul>
                                <li> <a href="javascript:;"><i class='bx bx-radio-circle'></i>Level Three</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>

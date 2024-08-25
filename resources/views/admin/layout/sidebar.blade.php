<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i></div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li class="@if (Route::currentRouteNamed('admin.dashboard')) page-active @endif">
            <a href="{{ route('admin.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i></div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        {{-- Manage Category --}}
        @if(Auth::user()->can('category.menu'))
        <li id="menu-category" class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Category</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('all.category'))
                <li class="@if (Route::currentRouteNamed('all.category')) page-active @endif">
                    <a href="{{ route('all.category') }}"><i class='bx bx-radio-circle'></i>All Category</a>
                </li>
                @endif
                @if(Auth::user()->can('subcategory.all'))
                <li class="@if (Route::currentRouteNamed('all.subcategory')) page-active @endif">
                    <a href="{{ route('all.subcategory') }}"><i class='bx bx-radio-circle'></i>All Sub Category</a>
                </li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Instructor --}}
        @if(Auth::user()->can('instructor.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Instructor</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('instructor.all'))
                <li><a href="{{ route('all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Courses --}}
        @if(Auth::user()->can('course.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Courses</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('course.all'))
                <li><a href="{{ route('admin.all.courses') }}"><i class='bx bx-radio-circle'></i>All Course</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Coupon --}}
        @if(Auth::user()->can('coupon.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Coupon</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('coupon.all'))
                <li><a href="{{ route('admin.all.coupon') }}"><i class='bx bx-radio-circle'></i>All Coupons</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Orders --}}
        @if(Auth::user()->can('order.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Orders</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('order.pending'))
                <li><a href="{{ route('admin.pending.order') }}"><i class='bx bx-radio-circle'></i>Pending Order</a></li>
                @endif
                @if(Auth::user()->can('order.confirm'))
                <li><a href="{{ route('admin.confirm.order') }}"><i class='bx bx-radio-circle'></i>Confirm Order</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Report --}}
        @if(Auth::user()->can('report.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Report</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('report.view'))
                <li><a href="{{ route('admin.all.report.view') }}"><i class='bx bx-radio-circle'></i>Report View</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Review --}}
        @if(Auth::user()->can('review.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Review</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('review.pending'))
                <li><a href="{{ route('admin.pending.review') }}"><i class='bx bx-radio-circle'></i>Pending Review</a></li>
                @endif
                @if(Auth::user()->can('review.active'))
                <li><a href="{{ route('admin.active.review') }}"><i class='bx bx-radio-circle'></i>Active Review</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage All Users --}}
        @if(Auth::user()->can('all.user.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage All Users</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('all.user'))
                <li><a href="{{ route('admin.all.users') }}"><i class='bx bx-radio-circle'></i>All Users</a></li>
                @endif
                @if(Auth::user()->can('all.instructor'))
                <li><a href="{{ route('admin.all.instructor') }}"><i class='bx bx-radio-circle'></i>All Instructor</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Blogs --}}
        @if(Auth::user()->can('blog.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Blogs</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('blog.category'))
                <li><a href="{{ route('blog.category') }}"><i class='bx bx-radio-circle'></i>Blog Category</a></li>
                @endif
                @if(Auth::user()->can('blog.post'))
                <li><a href="{{ route('blog.posts') }}"><i class='bx bx-radio-circle'></i>Blog Posts</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Settings --}}
        @if(Auth::user()->can('setting.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Settings</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('site.setting'))
                <li><a href="{{ route('admin.frontend.sitesettings') }}"><i class='bx bx-radio-circle'></i>Site Settings</a></li>
                @endif
                @if(Auth::user()->can('all.smtp'))
                <li><a href="{{ route('admin.all.smtp') }}"><i class='bx bx-radio-circle'></i>All Smtp</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Role & Permission --}}
        @if(Auth::user()->can('rolepermission.menu'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Role & Permission</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('all.permission'))
                <li><a href="{{ route('admin.all.permission') }}"><i class='bx bx-radio-circle'></i>All Permissions</a></li>
                @endif
                @if(Auth::user()->can('all.role'))
                <li><a href="{{ route('admin.all.role') }}"><i class='bx bx-radio-circle'></i>All Role</a></li>
                @endif
                @if(Auth::user()->can('role.in.permission'))
                <li><a href="{{ route('admin.role.permission') }}"><i class='bx bx-radio-circle'></i>Role In Permission</a></li>
                @endif
                @if(Auth::user()->can('all.role.permission'))
                <li><a href="{{ route('admin.all.role.permission') }}"><i class='bx bx-radio-circle'></i>All Role In Permission</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Manage Admin --}}
        @if(Auth::user()->can('manage.admin'))
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i></div>
                <div class="menu-title">Manage Admin</div>
            </a>
            <ul class="submenu">
                @if(Auth::user()->can('manage.all.admin'))
                <li><a href="{{ route('manage.all.admin') }}"><i class='bx bx-radio-circle'></i>All Admin</a></li>
                @endif
            </ul>
        </li>
        @endif

        {{-- Documentation --}}
        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i></div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>

        {{-- Support --}}
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i></div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.menu-item > .has-arrow').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var $menu = $this.next('.submenu');

            // Close other submenus
            $('.submenu').not($menu).slideUp();
            $('.menu-item > .has-arrow').not($this).removeClass('active');

            // Toggle the clicked submenu
            $menu.slideToggle();
            $this.toggleClass('active');
        });
    });
</script>

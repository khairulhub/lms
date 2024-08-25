
@php
    $id = Auth::user()->id;
    $instructorid = App\Models\User::find($id);
    $status = $instructorid->status;
@endphp


<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Instructor</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('instructor.dashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if ($status === '1')


        <li id="menu-category" class="menu-item" >
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Course Manage</div>
            </a>
            <ul class="submenu">
                <li> <a href="{{ route('all.course') }}"><i class='bx bx-radio-circle'></i>All Course</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Course order</div>
            </a>
            <ul class="submenu">
                <li> <a href="{{ route('instructor.all.order') }}"><i class='bx bx-radio-circle'></i>All order</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Course Questions</div>
            </a>
            <ul class="submenu">
                <li> <a href="{{ route('instructor.all.questions') }}"><i class='bx bx-radio-circle'></i>All Questions</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Coupon</div>
            </a>
            <ul class="submenu">
                <li> <a href="{{ route('instructor.all.cupon') }}"><i class='bx bx-radio-circle'></i>All Coupon</a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Manage Review</div>
            </a>
            <ul class="submenu">
                <li> <a href="{{ route('instructor.all.review') }}"><i class='bx bx-radio-circle'></i>All Review</a>
                </li>
            </ul>
        </li>



        <li class="menu-label">UI Elements</li>


        <li >
            <a href="{{ route('instructor.live.chat') }}">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Live Chat</div>
            </a>
        </li>







        <li>
            <a href="https://codervent.com/rocker/documentation/index.html" target="_blank">
                <div class="parent-icon"><i class="bx bx-folder"></i>
                </div>
                <div class="menu-title">Documentation</div>
            </a>
        </li>
        @else


        @endif
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

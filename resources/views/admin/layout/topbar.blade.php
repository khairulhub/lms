<header>
    <div class="topbar d-flex align-items-center">
        <nav class="gap-3 navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>

            <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                data-bs-target="#SearchModal">
                <input class="px-5 form-control" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 fs-5"><i
                        class='bx bx-search'></i></span>
            </div>


            <div class="top-menu ms-auto">
                <ul class="gap-1 navbar-nav align-items-center">
                    <li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="avascript:;"
                            data-bs-toggle="dropdown"><img src="assets/images/county/02.png" width="22"
                                alt="">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/01.png" width="20" alt=""><span
                                        class="ms-2">English</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/02.png" width="20" alt=""><span
                                        class="ms-2">Catalan</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/03.png" width="20" alt=""><span
                                        class="ms-2">French</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/04.png" width="20" alt=""><span
                                        class="ms-2">Belize</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/05.png" width="20" alt=""><span
                                        class="ms-2">Colombia</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/06.png" width="20" alt=""><span
                                        class="ms-2">Spanish</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/07.png" width="20" alt=""><span
                                        class="ms-2">Georgian</span></a>
                            </li>
                            <li><a class="py-2 dropdown-item d-flex align-items-center" href="javascript:;"><img
                                        src="assets/images/county/08.png" width="20" alt=""><span
                                        class="ms-2">Hindi</span></a>
                            </li>
                        </ul>
                    </li>


                    
                    <li class="nav-item dark-mode d-none d-sm-flex">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
                        </a>
                    </li>

                    @php
                    $ncount = Auth::user()->unreadNotifications()->count();
                @endphp
                    <li class="nav-item dropdown dropdown-large">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown"><span class="alert-count" id="notification-count">{{$ncount}}</span>
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    
                                </div>
                            </a>
                            @php
                            $user = Auth::user();
                            @endphp
                            <div class=" header-notifications-list">

                                @forelse($user->notifications as $notification )
                                <a class="p-2 dropdown-item" href="javascript:;" onclick="markNotificationReadAdmin('{{ $notification->id }}')">
                                    <div class=" d-flex align-items-center">
                                        <div class="user-online">
                                            <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}" class="msg-avatar"
                                                alt="user avatar">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="msg-name">New Notification<span class="msg-time float-end">{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span></h6>
                                            <p class="msg-info">{{$notification->data['message']}}</p>
                                        </div>
                                    </div>
                                </a>
                            @empty

                            @endforelse

                                

                                
                                
                            </div>
                            <a href="javascript:;">
                                <div class="text-center msg-footer">
                                    <button class="btn btn-primary w-100">View All Notifications</button>
                                </div>
                            </a>
                        </div>
                    </li>
                    
                </ul>
            </div>




            @php
                $id = Auth::user()->id;
                $profileData = App\Models\User::find($id);
            @endphp

            <div class="px-3 user-box dropdown">
                <a class="gap-3 d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_image/' . $profileData->photo) : url('upload/noimage.jpg') }}"
                        class="user-img" alt="user avatar">
                    <div class="user-info">
                        <p class="mb-0 user-name">{{ $profileData->name }}</p>
                        <p class="mb-0 designattion">{{ $profileData->email }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}"><i
                                class="bx bx-user fs-5"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center"
                            href="{{ route('admin.change.password') }}"><i class="bx bx-cog fs-5"></i><span>Change
                                Password</span></a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-home-circle fs-5"></i><span>Dashboard</span></a>
                    </li>
                  
                   
                    <li>
                        <div class="mb-0 dropdown-divider"></div>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.logout') }}"><i
                                class="bx bx-log-out-circle"></i><span>Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<script>
    function markNotificationReadAdmin(id) {
        fetch('/mark-notification-as-read/' + id, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({})
        })
        .then(response => response.text())  // Change to text to log the response
        .then(data => {
            
            try {
                const jsonData = JSON.parse(data);
                document.getElementById('notification-count').textContent = jsonData.count;
            } catch (error) {
                console.error('Error parsing JSON:', error);
            }
        })
        .catch(err => {
            console.log(err);
        });
    }
</script>


<!-- Navbar -->
<nav class="navbar-top sticky-top">
    <section class="container-fluid">
        <div class="nav-content d-flex justify-content-between align-items-center">
            <div class="d-flex justify-content-start align-items-center">
                <div>
                    <button class="nav-btn closeNav">
                        <svg class="hamburgerIcon" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            fill="none" viewBox="0 0 32 32">
                            <path stroke="#828282" stroke-linecap="round" stroke-width="2.5"
                                d="M4.25 6.75h22.5M4.25 16.75h13.5M4.25 26.75h22.5" />
                        </svg>

                </div>
                <div class="logo">
                    <span>Q.</span>
                    <span>Builder</span>
                </div>
            </div>
            <div class="d-flex justify-content-start align-items-center nav-settings">
                <div>
                    <button class="notif-btn">
                        <svg class="notificationIcon" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            fill="none" viewBox="0 0 32 32">
                            <path stroke="#828282" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M24 10.667a8 8 0 00-16 0c0 9.333-4 12-4 12h24s-4-2.667-4-12zM18.307 28a2.668 2.668 0 01-4.614 0" />
                        </svg>
                    </button>
                </div>
                <div>
                    <button class="notif-btn settingsAction">
                        <svg class="notificationIcon" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                            fill="none" viewBox="0 0 32 32">
                            <path stroke="#BDBDBD" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 20a4 4 0 100-8 4 4 0 000 8z" />
                            <path stroke="#BDBDBD" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M25.867 20a2.2 2.2 0 00.44 2.427l.08.08a2.666 2.666 0 01-.866 4.352 2.666 2.666 0 01-2.908-.58l-.08-.08a2.2 2.2 0 00-2.426-.44 2.2 2.2 0 00-1.334 2.014V28a2.666 2.666 0 11-5.333 0v-.12A2.2 2.2 0 0012 25.867a2.2 2.2 0 00-2.427.44l-.08.08a2.667 2.667 0 11-3.773-3.774l.08-.08a2.2 2.2 0 00.44-2.426 2.2 2.2 0 00-2.013-1.334H4a2.667 2.667 0 010-5.333h.12A2.2 2.2 0 006.133 12a2.2 2.2 0 00-.44-2.427l-.08-.08A2.667 2.667 0 017.5 4.938a2.667 2.667 0 011.887.782l.08.08a2.2 2.2 0 002.426.44H12a2.2 2.2 0 001.333-2.013V4a2.667 2.667 0 015.334 0v.12A2.2 2.2 0 0020 6.133a2.2 2.2 0 002.427-.44l.08-.08a2.665 2.665 0 013.773 0 2.667 2.667 0 010 3.774l-.08.08a2.2 2.2 0 00-.44 2.426V12a2.2 2.2 0 002.013 1.333H28a2.666 2.666 0 110 5.334h-.12A2.2 2.2 0 0025.867 20v0z" />
                        </svg>

                    </button>
                </div>
                <div>
                    <button class="notif-btn logoutBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="none"
                            viewBox="0 0 24 24">
                            <path fill="#000"
                                d="M4 12a1 1 0 001 1h7.59l-2.3 2.29a1.002 1.002 0 00.325 1.639 1 1 0 001.095-.219l4-4a1 1 0 00.21-.33 1 1 0 000-.76 1 1 0 00-.21-.33l-4-4a1.003 1.003 0 10-1.42 1.42l2.3 2.29H5a1 1 0 00-1 1zM17 2H7a3 3 0 00-3 3v3a1 1 0 002 0V5a1 1 0 011-1h10a1 1 0 011 1v14a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 10-2 0v3a3 3 0 003 3h10a3 3 0 003-3V5a3 3 0 00-3-3z" />
                        </svg>
                    </button>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <div class="userImage">
                        <a href="{{'profile'}}"><img src="{{asset('assets/images/user-img.svg')}}" alt="User Image"></a>
                    </div>
                    <div class="user-name">
                        <h1>Sheehan Rahman</h1>
                        <p>Super Admin</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</nav>
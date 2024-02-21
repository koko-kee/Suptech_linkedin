<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="notification bg-primary rounded-circle"></div>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if (session('current_role') == 'candidat' || session('current_role') == 'admin' )
                        <img src="{{ asset(Auth::User()->profil) }}" alt="" width="35">
                        @else
                        <img src="{{ asset(Auth::User()->entreprise->logo) }}" alt="" width="35">
                        @endif
                          
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body p-3">
                            @if (session('current_role') == 'candidat' || session('current_role') == 'admin')
                                <a href="{{ route('user.profil.index') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                            @else
                                <a href="{{ route('entreprise.profil') }}"
                                    class="d-flex align-items-center gap-2 dropdown-item">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">My Profile</p>
                                </a>
                            @endif

                            @if (Auth::User()->ManyRoles())
                                <a href="{{ route('switchRole', 3) }}"
                                    class="d-flex align-items-center gap-2 dropdown-item @if (session('current_role') == 'candidat') bg-primary @endif">
                                    <i class="ti ti-user fs-6"></i>
                                    <p class="mb-0 fs-3">Candidat</p>
                                </a>
                                @if (Auth::User()->entreprise->isCompany)
                                    <a href="{{ route('switchRole', 2) }}"
                                        class="d-flex align-items-center gap-2 dropdown-item @if (session('current_role') == 'AdminEntreprise') bg-primary @endif ">
                                        <i class="ti ti-user fs-6"></i>
                                        <p class="mb-0 fs-3">Entreprise</p>
                                    </a>
                                @endif
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</button>
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

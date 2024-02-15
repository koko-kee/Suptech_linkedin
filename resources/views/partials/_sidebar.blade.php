<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="./index.html" class="text-nowrap logo-img">
                <img src="{{asset('../assets/images/logos/dark-logo.svg')}}" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Accueil</span>
                </li>
                {{-- START SIDEAR FOR THE CANDIDAT --}}
                @if (session('current_role') == 'candidat' && Auth::User())
                    
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('offres')}}" aria-expanded="false">
                        <span>
                        <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Offres</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="./ui-buttons.html" aria-expanded="false">
                <span>
                    <i class="ti ti-layout-dashboard"></i>
                </span>
                        <span class="hide-menu">Mes Demandes</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('user.cv')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Gerer Mes CV</span>
                    </a>
                </li>
                @endif
            
                {{-- END SIDEAR FOR THE CANDIDAT --}}

                {{-- START SIDEAR FOR THE ENTREPRISE --}}

                 @if (session('current_role') == 'AdminEntreprise' && Auth::User())
                 <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('dash')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">DashBoard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('entreprise.offre.Myoffre')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Nos Offres</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('entreprise.offre')}}" aria-expanded="false">
                        <span>
                        <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Publier une Offre</span>
                    </a>
                </li>
                @endif
                 {{-- END SIDEAR FOR THE ENTREPRISE --}}

                @if (Auth::User()->isAdmin())
                
                {{-- Start SideBar For the admin --}}
            
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('roles.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Gestion des roles</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('competences.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Gestion des competences</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('niveaux.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Gestion des niveaux</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{route('localites.index')}}" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                        <span class="hide-menu">Gestion des localites</span>
                    </a>
                </li>
                @endif
                {{-- End SideBar For the admin --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

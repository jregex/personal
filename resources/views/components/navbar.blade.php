<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start my-3 ms-4 border-0 bg-white"
    id="sidenav-main" data-color="primary">
    <div class="sidenav-header text-center">
        <a class="navbar-brand text-dark fw-bold text-uppercase m-0 text-xl" href="{{ route('dashboard') }}">
            Wisnu Trisardi
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="navbar-collapse collapse h-auto w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('educations.*') ? 'active' : '' }}"
                    href="{{ route('educations.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-hat-3 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pendidikan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('skill.*') ? 'active' : '' }}" href="{{ route('skill.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-ui-04 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Skills</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('category.*') ? 'active' : '' }}"
                    href="{{ route('category.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-collection text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Category Archivement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('archivements.*') ? 'active' : '' }}"
                    href="{{ route('archivements.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-hat-3 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Archivement</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('galleries.*') ? 'active' : '' }}"
                    href="{{ route('galleries.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-image text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Gallery Archivement</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="text-uppercase font-weight-bolder opacity-6 ms-2 ps-4 text-xs">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('users.index') ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

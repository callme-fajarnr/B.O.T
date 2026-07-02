<header class="navbar navbar-glossy fixed-top">

    <div class="container-fluid px-3 px-md-4">

        <!-- LEFT -->
        <div class="d-flex align-items-center gap-2">

            <!-- Mobile Sidebar -->
            <button id="sidebarToggle" class="btn-glass d-md-none" type="button">

                <i class="bi bi-list fs-5"></i>

            </button>

            <!-- Desktop Logo -->
            <div class="d-flex align-items-center gap-2">

                @if ($company && $company->logo)
                    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->namecompany }}"
                        class="header-logo">
                @else
                    <span class="fw-bold">
                        B.O.T
                    </span>
                @endif

                <span class="fw-bold">
                    {{ $company->namecompany ?? 'Dashboard' }}
                </span>

            </div>

        </div>

        <!-- SEARCH DESKTOP -->
        <div class="d-none d-md-flex flex-grow-1 justify-content-center px-4">

            <div class="search-wrapper">

                <i class="bi bi-search"></i>

                <input type="text" class="form-control search-glass" placeholder="Search anything...">

            </div>

        </div>

        <!-- RIGHT -->
        <div class="d-flex align-items-center gap-2">

            <!-- Search Mobile -->
            <button class="btn-glass d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch">

                <i class="bi bi-search"></i>

            </button>

            <!-- User Dropdown -->
            <div class="dropdown d-none d-md-block">

                <button class="btn-glass border-0" type="button" id="userDropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <i class="bi bi-person-circle fs-5"></i>

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4" aria-labelledby="userDropdown">

                    <li class="px-3 py-2">

                        <div class="d-flex align-items-center gap-3">

                            <div class="fs-2 text-primary">
                                <i class="bi bi-person-circle"></i>
                            </div>

                            <div>

                                <div class="fw-semibold">
                                    {{ auth()->user()->name }}
                                </div>

                                <small class="text-muted">
                                    {{ auth()->user()->email }}
                                </small>

                            </div>

                        </div>

                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form action="/logout" method="POST">
                            @csrf

                            <button type="submit" class="dropdown-item text-danger">

                                <i class="bi bi-box-arrow-right me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

    <!-- MOBILE SEARCH -->
    <div id="navbarSearch" class="collapse d-md-none mobile-search">

        <div class="p-3">

            <div class="search-wrapper">

                <i class="bi bi-search"></i>

                <input type="text" class="form-control search-glass" placeholder="Search anything...">

            </div>

        </div>

    </div>

</header>

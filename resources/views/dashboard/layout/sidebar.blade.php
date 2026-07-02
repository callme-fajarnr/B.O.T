<div class="sidebar">
    <div class="sidebar-glass" id="sidebarMenu">

        <div class="sidebar-content">

            <ul class="nav flex-column">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/banner"
                        class="nav-link sidebar-link {{ Request::is('dashboard/banner*') ? 'active' : '' }}">
                        <i class="bi bi-window"></i>
                        <span>Banner</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/dashboard/post"
                        class="nav-link sidebar-link {{ Request::is('dashboard/post*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>My Post</span>
                    </a>
                </li>

            </ul>

            @can('admin')
                <div class="sidebar-section">
                    Administrator
                </div>

                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a href="/dashboard/categories"
                            class="nav-link sidebar-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                            <i class="bi bi-grid"></i>
                            <span>Add Category</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/dashboard/namecompany"
                            class="nav-link sidebar-link {{ Request::is('dashboard/namecompany*') ? 'active' : '' }}">
                            <i class="bi bi-buildings"></i>
                            <span>Nama Company</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/dashboard/about"
                            class="nav-link sidebar-link {{ Request::is('dashboard/about*') ? 'active' : '' }}">
                            <i class="bi bi-info-circle"></i>
                            <span>About</span>
                        </a>
                    </li>

                </ul>
            @endcan

            <hr>

            <ul class="nav flex-column">

                <li class="nav-item">
                    <a href="/dashboard/user"
                        class="nav-link sidebar-link {{ Request::is('dashboard/user*') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>Management Akun</span>
                    </a>
                </li>

                <li class="nav-item">

                    <form action="/logout" method="POST">
                        @csrf

                        <button type="submit" class="nav-link sidebar-link border-0 bg-transparent w-100 text-start">

                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>

                        </button>
                    </form>

                </li>

            </ul>

        </div>

    </div>
</div>

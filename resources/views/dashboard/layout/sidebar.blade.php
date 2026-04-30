<div class="sidebar col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">POUR PICTURES</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Dashboard
            </a>
          </li>

          <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/banner*') ? 'active' : '' }}" href="/dashboard/banner">
                  <i class="bi bi-window"></i>
                  Banner
              </a>
          </li>

          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/post*') ? 'active' : '' }}" href="/dashboard/post">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Post
            </a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/post-link*') ? 'active' : '' }}" href="/dashboard/post-link">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              My Post Link
            </a>
          </li> --}}
        </ul>

        @can('admin')    
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
          <span>Admnistrator</span>
        </h6>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
              <i class="bi bi-plus-square"></i>
              Add Category
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/namecompany*') ? 'active' : '' }}" href="/dashboard/namecompany">
              <i class="bi bi-boxes"></i>
              Nama Company
            </a>
          </li>
        </ul>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/about*') ? 'active' : '' }}" href="/dashboard/about">
              <i class="bi bi-house-gear-fill"></i>
              About
            </a>
          </li>
        </ul>
        @endcan
        

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="nav-link px-3 border-0"><i class="bi bi-box-arrow-in-left"></i> Logout</button>
          </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
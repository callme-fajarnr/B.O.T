<nav class="navbar fixed-top navbar-dark custom-navbar transparent">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        
      <div class="offcanvas offcanvas-end custom-offcanvas dark-mode" tabindex="-1" id="offcanvasDarkNavbar">

        <div class="offcanvas-body d-flex flex-column p-4">

          <!-- MENU -->
          <ul class="navbar-nav flex-grow-1">

            <li class="nav-item mb-2">
              <a class="nav-link {{ $tittle === "home" ? 'active' : ''}}" href="/">Home</a>
            </li>

            <li class="nav-item mb-2">
              <a class="nav-link {{ $tittle === "project" ? 'active' : ''}}" href="/blog">Project</a>
            </li>

            <li class="nav-item mb-2">
              <a class="nav-link {{ $tittle === "about" ? 'active' : ''}}" href="/cobaproject">Single Project</a>
            </li>

            <li class="nav-item mb-2">
              <a class="nav-link {{ $tittle === "about" ? 'active' : ''}}" href="/about">Aboute</a>
            </li>

            <li class="nav-item mb-3">
              <a class="nav-link {{ $tittle === "categories" ? 'active' : ''}}" href="/categories">Catregory</a>
            </li>

            <!-- AUTH -->
            <div class="mt-3 pt-3 border-top">

              @auth
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  Wellcome back, {{ auth()->user()->name }}
                </a>

                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="/dashboard">
                      <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
                    </a>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-in-left"></i> Logout
                      </button>
                    </form>
                  </li>
                </ul>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="/login">
                  <i class="bi bi-box-arrow-in-right"></i> Login
                </a>
              </li>
              @endauth

            </div>

          </ul>

          <!-- SEARCH -->
          <form class="d-flex mt-3">
            <input class="form-control me-2" type="search" placeholder="Search">
            <button class="btn btn-success">Search</button>
          </form>

          <!-- FOOTER OFFCANVAS -->
          <div class="mt-4 pt-3 border-top small">
            <p class="mb-1">Wanna talk to us?</p>
            <a href="https://www.instagram.com/pour.pictures/">Contact</a>
          </div>

          <!-- SOCIAL -->
          <div class="mt-3 small">
            <div class="row g-2">
              <div class="col">Social</div>
              <div class="col">Social</div>
            </div>
          </div>

        </div>
      </div>
      
    </div>
</nav>

  
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $company->namecompany ?? 'My Website' }}</title>

    @if ($company && $company->logo)
        <link rel="icon" href="{{ asset('storage/' . $company->logo) }}">
    @endif

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">

    {{-- trix editor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js">
    </script>
</head>

<body>

    @include('dashboard.layout.header')

    @include('dashboard.layout.sidebar')

    <main class="main-content">
        <div class="content-wrapper">
            @yield('container')
        </div>
    </main>

    @include('dashboard.layout.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {

            const sidebar = document.querySelector(".sidebar");
            const overlay = document.getElementById("sidebarOverlay");

            const openBtn = document.getElementById("sidebarToggle");
            const closeBtn = document.getElementById("sidebarClose");

            function openSidebar() {
                sidebar.classList.add("show");
                overlay.classList.add("show");
                document.body.style.overflow = "hidden";
            }

            function closeSidebar() {
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
                document.body.style.overflow = "";
            }

            openBtn?.addEventListener("click", openSidebar);

            closeBtn?.addEventListener("click", closeSidebar);

            overlay?.addEventListener("click", closeSidebar);

            window.addEventListener("resize", () => {
                if (window.innerWidth >= 768) {
                    closeSidebar();
                }
            });

        });
    </script>
</body>

</html>

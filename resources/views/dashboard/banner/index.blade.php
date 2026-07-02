@extends('dashboard.layout.main')

@section('container')
    {{-- HEADER --}}
    <div class="dashboard-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>

                <h1 class="dashboard-title">
                    Website <span>Banner</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage banner image.
                </p>

            </div>

            <a href="/dashboard/banner/create" class="btn btn-primary rounded-4 px-4">

                <i class="bi bi-plus-circle me-2"></i>

                Create Banner

            </a>

        </div>

    </div>

    {{-- ALERT --}}
    @if (session()->has('success'))
        <div class="alert glass-alert mb-4">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>
    @endif

    {{-- CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="row mb-4">

            <div class="col-lg-5">

                <div class="search-box">

                    <i class="bi bi-search"></i>

                    <input class="form-control" type="text" placeholder="Search company profile...">

                </div>

            </div>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-listing align-middle">

                    <thead>

                        <tr>

                            <th width="70">
                                #
                            </th>

                            <th>
                                Banner Title
                            </th>

                            <th width="140">
                                Preview
                            </th>

                            <th width="130">
                                Status
                            </th>

                            <th width="170" class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($banner as $item)
                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    <div class="fw-semibold">

                                        {{ $item->title }}

                                    </div>

                                </td>

                                <td>

                                    @if ($item->image)
                                        <img src="{{ asset('storage/' . $item->image) }}" class="table-image"
                                            alt="Banner">
                                    @else
                                        <div class="table-image-placeholder">

                                            <i class="bi bi-image"></i>

                                        </div>
                                    @endif

                                </td>

                                <td>

                                    <form action="/dashboard/banner/{{ $item->id }}/toggle" method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <div class="form-check form-switch">

                                            <input class="form-check-input toggle-status" type="checkbox"
                                                {{ $item->is_active ? 'checked' : '' }}>

                                        </div>

                                    </form>

                                </td>

                                <td>

                                    <div class="action-group">

                                        <a href="/dashboard/banner/{{ $item->id }}/edit" class="btn-action edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="/dashboard/banner/{{ $item->id }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn-action delete"
                                                onclick="return confirm('Delete this banner?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5">

                                    <div class="text-center py-5">

                                        <div class="empty-state">

                                            <i class="bi bi-image"></i>

                                        </div>

                                        <h5 class="mt-4 fw-bold">
                                            No Banner Available
                                        </h5>

                                        <p class="text-secondary">
                                            Create your first homepage banner.
                                        </p>

                                        <a href="/dashboard/banner/create" class="btn btn-primary mt-2">

                                            Create Banner

                                        </a>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <script>
        document.querySelectorAll('.toggle-status').forEach(function(toggle) {

            toggle.addEventListener('change', function() {

                this.closest('form').submit();

            });

        });
    </script>
@endsection

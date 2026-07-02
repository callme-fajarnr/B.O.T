@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Company <span>About</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage company profile, introduction and landing page information.
                </p>
            </div>

            <a href="/dashboard/about/create" class="btn btn-primary px-4 py-2 rounded-4 shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>
                Create About
            </a>

        </div>

    </div>

    @if (session()->has('success'))
        <div class="alert glass-alert mb-4"> <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }} </div>
    @endif

    <div class="card">
        <div class="card-body">

            <div class="row mb-4">

                <div class="col-lg-5">

                    <div class="search-box">

                        <i class="bi bi-search"></i>

                        <input class="form-control" type="text" placeholder="Search company profile...">

                    </div>

                </div>

            </div>

            <div class="card border-0">

                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-hover table-listing align-middle">

                            <thead>

                                <tr>

                                    <th>#</th>

                                    <th>Company Intro</th>

                                    <th>Headline</th>

                                    <th>Subtitle</th>

                                    <th>Solo & Sight</th>

                                    <th class="text-center">
                                        Image
                                    </th>

                                    <th>Created</th>

                                    <th class="text-center">
                                        Action
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse ($about as $ab)
                                    <tr>

                                        <td class="fw-semibold">
                                            {{ Str::limit($ab->line_1, 40) }}
                                        </td>

                                        <td>
                                            {{ Str::limit($ab->line_2, 35) }}
                                        </td>

                                        <td class="text-secondary">
                                            {{ Str::limit($ab->line_3, 35) }}
                                        </td>

                                        <td>
                                            <span class="badge bg-primary-subtle text-primary">
                                                {{ Str::limit($ab->solo_sight, 20) }}
                                            </span>
                                        </td>

                                        <td>
                                            {{ $ab->solo_sight }}
                                        </td>

                                        <td>

                                            @if ($ab->image_about)
                                                <img src="{{ asset('storage/' . $ab->image_about) }}"
                                                    class="table-image rounded-4 shadow-sm" alt="">
                                            @else
                                                <div class="table-image-placeholder">
                                                    <i class="bi bi-image"></i>
                                                </div>
                                            @endif

                                        </td>

                                        <td>
                                            {{ $ab->created_at->format('d M Y') }}
                                        </td>

                                        <td>

                                            <div class="action-group">

                                                <a href="/dashboard/about/{{ $ab->id }}" class="btn-action view">
                                                    <i class="bi bi-eye"></i>
                                                </a>

                                                <a href="/dashboard/about/{{ $ab->id }}/edit" class="btn-action edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                <form action="/dashboard/about/{{ $ab->id }}" method="POST"
                                                    class="d-inline">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button onclick="return confirm('Delete this data?')"
                                                        class="btn-action delete">

                                                        <i class="bi bi-trash"></i>

                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8">

                                            <div class="py-5 text-center">

                                                <div class="empty-state">

                                                    <i class="bi bi-folder2-open"></i>

                                                </div>

                                                <h5 class="mt-4 fw-bold">
                                                    No About Data
                                                </h5>

                                                <p class="text-secondary">
                                                    Start by creating your first company profile.
                                                </p>

                                                <a href="/dashboard/about/create" class="btn btn-primary mt-2">

                                                    Create About

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
        @endsection

@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Company <span>Management</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage your company information and branding.
                </p>
            </div>

            <a href="{{ route('namecompany.create') }}" class="btn btn-primary px-4 rounded-4">
                <i class="bi bi-plus-circle me-2"></i>
                Create Company
            </a>

        </div>
    </div>

    @if (session('success'))
        <div class="alert glass-alert mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
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

            <div class="table-responsive">

                <table class="table table-hover table-listing align-middle">

                    <thead>

                        <tr>

                            <th width="70">#</th>

                            <th width="110">Logo</th>

                            <th>Company</th>

                            <th>Tagline</th>

                            <th>Description</th>

                            <th width="150" class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($namecom as $name)
                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    @if ($name->logo)
                                        <img src="{{ asset('storage/' . $name->logo) }}" class="rounded-4 shadow-sm border"
                                            style="width:70px;height:70px;object-fit:cover;">
                                    @else
                                        <div class="rounded-4 bg-light d-flex align-items-center justify-content-center border"
                                            style="width:70px;height:70px;">

                                            <i class="bi bi-image text-secondary"></i>

                                        </div>
                                    @endif

                                </td>

                                <td>

                                    <div class="fw-semibold">

                                        {{ $name->namecompany }}

                                    </div>

                                </td>

                                <td>

                                    <span class="text-muted">

                                        {{ $name->takeline }}

                                    </span>

                                </td>

                                <td style="max-width:320px;">

                                    <small class="text-muted">

                                        {{ Str::limit($name->deccompany, 70) }}

                                    </small>

                                </td>

                                <td>

                                    <div class="action-group">

                                        <a href="{{ route('namecompany.edit', $name->id) }}" class="btn-action edit"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('namecompany.destroy', $name->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn-action delete"
                                                onclick="return confirm('Delete this company?')">

                                                <i class="bi bi-trash3"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center py-5">

                                    <i class="bi bi-building fs-1 d-block mb-3 opacity-50"></i>

                                    No company data found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <style>
        .action-group {

            display: flex;
            justify-content: center;
            gap: 10px;

        }

        .btn-action {

            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            text-decoration: none;
            border: none;
            transition: .25s;

        }

        .edit {

            background: #fff7ed;
            color: #ea580c;

        }

        .delete {

            background: #fef2f2;
            color: #dc2626;

        }

        .btn-action:hover {

            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

        }
    </style>
@endsection

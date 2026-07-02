@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    User <span>Management</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage user roles and administrator access.
                </p>
            </div>

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

            <div class="table-responsive">

                <table class="table table-hover table-listing align-middle">

                    <thead>

                        <tr>

                            <th width="70">#</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th width="170" class="text-center">
                                Role
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)
                            <tr>

                                <td>

                                    {{ $loop->iteration }}

                                </td>

                                <td>

                                    <div class="fw-semibold">

                                        {{ $user->name }}

                                    </div>

                                </td>

                                <td>

                                    <span class="text-muted">

                                        {{ $user->email }}

                                    </span>

                                </td>

                                <td class="text-center">

                                    <form action="/dashboard/user/{{ $user->id }}/toggle" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('PATCH')

                                        <button type="submit" class="role-btn {{ $user->is_admin ? 'admin' : 'user' }}">

                                            <i class="bi {{ $user->is_admin ? 'bi-shield-check' : 'bi-person' }} me-1"></i>

                                            {{ $user->is_admin ? 'Admin' : 'User' }}

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4" class="text-center py-5">

                                    <i class="bi bi-people fs-1 opacity-50 d-block mb-3"></i>

                                    No users found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <style>
        .role-btn {

            border: none;
            border-radius: 12px;
            padding: 8px 18px;
            font-weight: 600;
            transition: .25s;

        }

        .role-btn.admin {

            background: #ecfdf5;
            color: #059669;

        }

        .role-btn.user {

            background: #f3f4f6;
            color: #4b5563;

        }

        .role-btn:hover {

            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, .08);

        }
    </style>
@endsection

@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Management Akun</h1>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>

                        <td>
                            <form action="/dashboard/user/{{ $user->id }}/toggle" method="POST" class="d-inline">
                                @csrf
                                @method('patch')

                                <button class="btn btn-sm {{ $user->is_admin ? 'btn-success' : 'btn-secondary' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
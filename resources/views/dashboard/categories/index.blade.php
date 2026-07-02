@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Category <span>Management</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage categories used for your posts.
                </p>
            </div>

            <a href="{{ route('categories.create') }}" class="btn btn-primary px-4 rounded-4">
                <i class="bi bi-plus-circle me-2"></i>
                Create Category
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

            {{-- Table --}}
            <div class="table-responsive">

                <table class="table table-hover table-listing align-middle">

                    <thead>

                        <tr>

                            <th width="70">#</th>

                            <th>Name</th>

                            <th>Slug</th>

                            <th>Image</th>

                            <th width="150" class="text-center">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($categories as $cat)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $cat->name }}
                                </td>

                                <td>
                                    <span class="badge bg-light text-dark border px-3 py-2">
                                        {{ $cat->slug }}
                                    </span>
                                </td>

                                {{-- IMAGE --}}
                                <td>

                                    @if ($cat->image)
                                        <img src="{{ asset('storage/' . $cat->image) }}" class="rounded-4 shadow-sm"
                                            style="width:70px;height:70px;object-fit:cover;">
                                    @else
                                        <div class="table-image-placeholder">

                                            <i class="bi bi-image fs-4"></i>

                                        </div>
                                    @endif

                                </td>

                                {{-- ACTION --}}
                                <td>

                                    <div class="action-group">

                                        <a href="{{ route('categories.edit', $cat->slug) }}" class="btn-action edit"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('categories.destroy', $cat->slug) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn-action delete"
                                                onclick="return confirm('Delete this category?')">

                                                <i class="bi bi-trash3"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center py-5">

                                    <i class="bi bi-folder2-open fs-1 d-block mb-3 opacity-50"></i>

                                    No categories found.

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
            transition: .25s;
            border: none;

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

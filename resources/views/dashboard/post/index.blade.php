@extends('dashboard.layout.main')

@section('container')
    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Post <span>Management</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    Manage articles, news, and blog posts.
                </p>
            </div>

            <a href="{{ route('post.create') }}" class="btn btn-primary rounded-4 px-4">
                <i class="bi bi-plus-circle me-2"></i>
                Create Post
            </a>

        </div>
    </div>

    @if (session()->has('success'))
        <div class="alert glass-alert mb-4">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body p-4">

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
                            <th width="60">#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th width="170">Published</th>
                            <th width="160">Action</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($posts as $post)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    <div class="fw-semibold">
                                        {{ $post->tittle }}
                                    </div>

                                </td>

                                <td>

                                    <span class="badge bg-primary-subtle text-primary border">
                                        {{ $post->category->name }}
                                    </span>

                                </td>

                                <td>

                                    {{ $post->created_at->format('d M Y') }}

                                </td>

                                <td>

                                    <div class="action-group">

                                        <a href="/dashboard/post/{{ $post->slug }}" class="btn-action view"
                                            title="View">

                                            <i class="bi bi-eye"></i>

                                        </a>

                                        <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn-action edit"
                                            title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">

                                            @method('DELETE')
                                            @csrf

                                            <button type="submit" class="btn-action delete" title="Delete"
                                                onclick="return confirm('Delete this post?')">

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

                                    No posts found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>
@endsection

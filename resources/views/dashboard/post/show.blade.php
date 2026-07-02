@extends('dashboard.layout.main')

@section('container')

    <div class="dashboard-header mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h1 class="dashboard-title">
                    Detail <span>Post</span>
                </h1>

                <p class="dashboard-subtitle mb-0">
                    View complete post information.
                </p>
            </div>

            <a href="{{ route('post.index') }}" class="btn btn-light rounded-4 px-4 shadow-sm">
                <i class="bi bi-arrow-left me-2"></i>
                Back
            </a>

        </div>
    </div>


    <div class="card">
        <div class="card-body p-4">

            {{-- Action --}}
            <div class="d-flex justify-content-end mb-4">

                <div class="action-group">

                    <a href="{{ route('post.edit', $post->slug) }}" class="btn-action edit" title="Edit">

                        <i class="bi bi-pencil"></i>

                    </a>

                    <form action="{{ route('post.destroy', $post->slug) }}" method="POST" class="d-inline">

                        @method('DELETE')
                        @csrf

                        <button class="btn-action delete" onclick="return confirm('Delete this post?')">

                            <i class="bi bi-trash3"></i>

                        </button>

                    </form>

                </div>

            </div>


            {{-- Title --}}
            <h2 class="fw-bold mb-2">

                {{ $post->tittle }}

            </h2>

            <div class="text-muted mb-4">

                <i class="bi bi-folder2-open me-1"></i>

                {{ $post->category->name }}

                <span class="mx-2">•</span>

                <i class="bi bi-calendar-event me-1"></i>

                {{ $post->created_at->format('d M Y') }}

            </div>


            {{-- Images --}}
            @php
                $images = [$post->image, $post->image2, $post->image3, $post->image4, $post->image5];
            @endphp

            @if (collect($images)->filter()->count())
                <div class="row g-3 mb-5">

                    @foreach ($images as $img)
                        @if ($img)
                            <div class="col-md-4">

                                <img src="{{ asset('storage/' . $img) }}" class="img-fluid rounded-4 shadow-sm w-100"
                                    style="height:230px;object-fit:cover;">

                            </div>
                        @endif
                    @endforeach

                </div>
            @endif


            {{-- Video --}}
            @if ($post->video)
                <div class="mb-5">

                    <h5 class="fw-semibold mb-3">

                        Video

                    </h5>

                    <video controls class="w-100 rounded-4 shadow-sm">

                        <source src="{{ asset('storage/' . $post->video) }}">

                    </video>

                </div>
            @endif


            {{-- Youtube --}}
            @if ($post->link)
                <div class="mb-5">

                    <h5 class="fw-semibold mb-3">

                        Youtube

                    </h5>

                    <a href="{{ $post->link }}" target="_blank" class="btn btn-outline-danger rounded-4">

                        <i class="bi bi-youtube me-2"></i>

                        Open Youtube

                    </a>

                </div>
            @endif


            {{-- Content --}}
            <div class="mb-5">

                <h5 class="fw-semibold mb-3">

                    Content

                </h5>

                <div class="post-body">

                    {!! $post->body !!}

                </div>

            </div>


            {{-- Credit --}}
            <div class="row g-4">

                <div class="col-md-6">

                    <div class="border rounded-4 p-4 h-100">

                        <h5 class="fw-bold mb-3">

                            Video & Edit

                        </h5>

                        <p class="mb-1">

                            <strong>Name :</strong>

                            {{ $post->videoeditby ?: '-' }}

                        </p>

                        <p class="mb-0">

                            <strong>Instagram :</strong>

                            {{ $post->igvideo ?: '-' }}

                        </p>

                    </div>

                </div>


                <div class="col-md-6">

                    <div class="border rounded-4 p-4 h-100">

                        <h5 class="fw-bold mb-3">

                            Photography

                        </h5>

                        <p class="mb-1">

                            <strong>Name :</strong>

                            {{ $post->photoby ?: '-' }}

                        </p>

                        <p class="mb-0">

                            <strong>Instagram :</strong>

                            {{ $post->igphoto ?: '-' }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- Actors --}}
            <div class="row mt-4">

                @for ($i = 1; $i <= 3; $i++)
                    @php
                        $actor = $post->{'aktor' . $i};
                        $ig = $post->{'igaktor' . $i};
                    @endphp

                    @if ($actor)
                        <div class="col-md-4">

                            <div class="border rounded-4 p-4 h-100">

                                <h5 class="fw-bold">

                                    Actor {{ $i }}

                                </h5>

                                <p class="mb-1">

                                    {{ $actor }}

                                </p>

                                <small class="text-muted">

                                    {{ $ig }}

                                </small>

                            </div>

                        </div>
                    @endif
                @endfor

            </div>

        </div>
    </div>


    <style>
        .action-group {
            display: flex;
            gap: 10px;
        }

        .btn-action {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
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
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .post-body {
            font-size: 16px;
            line-height: 1.9;
        }

        .post-body img {
            max-width: 100%;
            border-radius: 16px;
            margin: 20px 0;
        }

        .post-body iframe {
            width: 100%;
            min-height: 450px;
            border-radius: 16px;
        }
    </style>

@endsection

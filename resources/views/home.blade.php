@extends('layout.main')

@section('container')
    @foreach ($banner as $item)
        <div class="container-fluid p-0">
            <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/1280/700' }}"
                class="img-fluid w-100" alt="{{ $item->title }}">
        </div>
    @endforeach

    <div class="px-3">
        <div class="text-left bg-body-dark">
            <div class="py-5 text-start">

                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="#">
                        Learn more
                    </a>
                </div>

                @foreach ($namecom as $name)
                    <div class="py-4">
                        <h1 class="display-5 fw-bold">{{ $name->namecompany }}</h1>
                        <h5 class="fw-normal text-muted">{{ $name->takeline }}</h5>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- ================== 3 POST PERTAMA ================== --}}
    @if ($post->count() >= 3)
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row g-4">

                    @foreach ($post->take(3) as $item)
                        <div class="col-12 col-sm-6 col-md-4">
                            <a href="/blog/{{ $item->slug }}" class="text-decoration-none text-dark">

                                <div class="image-card">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/512/683?' . $item->category->name }}"
                                        alt="{{ $item->tittle }}">
                                </div>

                                <div class="pt-2">
                                    <p class="mb-1 small">{{ $item->excerpt }}</p>
                                    <h5>{{ $item->tittle }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    {{-- ================== 2 POST SELANJUTNYA ================== --}}
    @if ($post->count() >= 5)
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row g-4">

                    @foreach ($post->slice(3, 2) as $item)
                        <div class="col-12 col-md-6">
                            <a href="/blog/{{ $item->slug }}" class="text-decoration-none text-dark">

                                <div class="image-card-43">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://picsum.photos/792/594?' . $item->category->name }}"
                                        alt="{{ $item->tittle }}">
                                </div>

                                <div class="pt-2">
                                    <p class="mb-1 small">{{ $item->excerpt }}</p>
                                    <h5>{{ $item->tittle }}</h5>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif

    {{-- ================== SISANYA ================== --}}
    @if ($post->count() > 5)
        <div class="album py-5 bg-body-dark">
            <div class="px-3">

                @foreach ($post->skip(5) as $item)
                    <div class="mb-4">
                        <a href="/blog/{{ $item->slug }}" class="text-decoration-none text-dark">

                            @if ($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid w-100" width="1680"
                                    height="1120">
                            @else
                                <img src="https://picsum.photos/1680/1120?{{ $item->category->name }}"
                                    class="img-fluid w-100" width="1680" height="1120">
                            @endif

                            <div class="pt-2">
                                <p class="mb-1 small">{{ $item->excerpt }}</p>
                                <h4>{{ $item->tittle }}</h4>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    @endif

    {{-- ================== COMPANY DESC ================== --}}
    <div class="px-4 py-5">
        @foreach ($namecom as $name)
            <p class="text-muted">{{ $name->deccompany }}</p>
            <p class="text-muted">{{ $name->takeline }}</p>
        @endforeach

        <a href="/about" class="me-3">About Us</a>
        <a href="/blog">All Project</a>
    </div>

    {{-- ================== CLIENT / CATEGORY ================== --}}
    <div class="album py-5 bg-body-dark">
        <div class="container">

            <h3 class="text-center mb-4">Category</h3>

            <div class="client-wrapper">
                <div class="client-track">

                    @foreach ($categories as $category)
                        <div class="client-item">
                            <a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-dark">

                                <div class="client-card shadow-sm">
                                    <div class="client-img">
                                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://picsum.photos/512/400?' . $category->name }}"
                                            alt="{{ $category->name }}">
                                    </div>

                                    <div class="p-2 text-center">
                                        <h6 class="mb-0 small">{{ $category->name }}</h6>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach

                    {{-- DUPLICATE biar looping mulus --}}
                    @foreach ($categories as $category)
                        <div class="client-item">
                            <a href="/blog?category={{ $category->slug }}" class="text-decoration-none text-dark">

                                <div class="client-card shadow-sm">
                                    <div class="client-img">
                                        <img src="{{ $category->image ? asset('storage/' . $category->image) : 'https://picsum.photos/512/400?' . $category->name }}"
                                            alt="{{ $category->name }}">
                                    </div>

                                    <div class="p-2 text-center">
                                        <h6 class="mb-0 small">{{ $category->name }}</h6>
                                    </div>
                                </div>

                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection

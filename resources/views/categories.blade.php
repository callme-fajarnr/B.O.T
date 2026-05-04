@extends('layout.main')

@section('container')

<div class="container-fluid min-vh-100 d-flex flex-column justify-content-center">

    <h1 class="mb-5 text-center fw-bold">EXPLORE BY CATEGORY</h1>

    {{-- SCROLL WRAPPER --}}
    <div class="scroll-wrapper px-3">

        <div class="scroll-row">

            @foreach($categories as $category)
            <div class="category-col">
                <a href="/blog?category={{ $category->slug }}" class="text-decoration-none">

                    <div class="category-card position-relative overflow-hidden rounded-4 shadow-sm">

                        {{-- IMAGE --}}
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}" 
                                class="w-100 category-img"
                                alt="{{ $category->name }}">
                        @else
                            <img src="https://picsum.photos/500/500?{{ $category->name }}" 
                                class="w-100 category-img"
                                alt="{{ $category->name }}">
                        @endif

                        {{-- OVERLAY --}}
                        <div class="overlay d-flex align-items-center justify-content-center">
                            <h5 class="text-white fw-semibold mb-0">
                                {{ $category->name }}
                            </h5>
                        </div>

                    </div>

                </a>
            </div>
            @endforeach

        </div>

    </div>

</div>

@endsection
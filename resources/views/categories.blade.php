{{-- @dd($post) --}}
@extends('layout.main')

@section('container')
<h1 class="mb-5">Post categories</h1>

<div class="container">
    <div class="row">
        @foreach($categories as $category)
        <div class="col-md-4 py-3">
            <a href="/blog?category={{ $category->slug }}">
                <div class="card text-bg-dark text-white">
                    @if ($category->image)
                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="card-img" >
                    @else
                        <img src="https://picsum.photos/500/500?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
                    @endif
                    <div class="card-img-overlay d-flex align-items-center p-0">
                    <h5 class="card-title text-center flex-fill fs-5" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
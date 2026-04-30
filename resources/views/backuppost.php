{{-- @dd($post) --}}
@extends('layout.main')

@section('container')
<h1 class="mb-5 text-center">{{ $tittle }}</h1>

{{-- search --}}
<div class="row justify-content-center mb-3">
    <div class="col-md-6">
        <form action="/blog">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit">Search</button>
              </div>
        </form>
    </div>
</div>
{{-- end search --}}

@if ($post->skip(1)->count())
<div class="card mb-3">
    @if ($post[0]->image)
        <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->category->name }}" class="img-fluid">
    @else
        <img src="https://source.unsplash.com/random/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="...">
    @endif
    {{-- <img src="https://source.unsplash.com/random/1200x400?{{ $post[0]->category->name }}" class="card-img-top" alt="..."> --}}
    <div class="card-body text-center">
        <h5 class="card-title">
            <a href="/blog/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->tittle }}</a>
        </h5>
        <small class="text-body-secondary">
            <p>
                By. <a href="/blog?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> in <a href="/blog?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a>
                {{ $post[0]->created_at->diffForHumans() }}
            </p>
        </small>
      <p class="card-text">{{ $post[0]->excerpt }}</p>
      <a href="/blog/{{ $post[0]->slug }}" class="text-decoration-none">Read more...</a>
    </div>
  </div>

<div class="container">
    <div class="row">
        @foreach($post->skip(1) as $posts)
        <div class="col-md-4 mb-3">
            <div class="card">
                @if ($posts->image)
                    <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->category->name }}" class="img-fluid">
                  @else
                    <img src="https://source.unsplash.com/random/500x400?{{ $posts->category->name }}" class="card-img-top" alt="{{ $posts->category->name }}">
                  @endif
                {{-- <img src="https://source.unsplash.com/random/500x400?{{ $posts->category->name }}" class="card-img-top" alt="{{ $posts->category->name }}"> --}}
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="/blog/{{ $posts->slug }}" class="text-decoration-none text-dark">{{ $posts->tittle }}</a>
                    </h5>
                    <small class="text-body-secondary">
                        <p>
                            By. <a href="/blog?authors={{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a> {{ $posts->created_at->diffForHumans() }}
                        </p>
                    </small>
                  <p class="card-text">{{ $posts->excerpt }}</p>
                  <a href="/blog/{{ $posts->slug }}" class="btn btn-primary">Read More</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>

@else
    <p class="text-center fs-4">Post Kosong.</p>
@endif

<div class="d-flex justify-content-end">
    {{ $post->links() }}
</div>
    


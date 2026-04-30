@extends('dashboard.layout.main')

@section('container')
<div class="container">
    <div class="row my-5">
        <div class="col-8">
            <h2 class="mb-5">{{ $post->tittle }}</h2>
                <a href="/dashboard/post" class="btn btn-success"><i class="bi bi-backspace"></i> Back to all post</a>
                <a href="/dashboard/post/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
                <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i> Delete</button>
                  </form>

                  @php
                    $images = [
                      $post->image,
                      $post->image2,
                      $post->image3,
                      $post->image4,
                      $post->image5
                    ];
                  @endphp

                  <div class="d-flex gap-3 overflow-auto my-3">
                    @foreach ($images as $img)
                      @if ($img)
                        <img src="{{ asset('storage/' . $img) }}"
                            style="height:150px; object-fit:cover; border-radius:8px;">
                      @endif
                    @endforeach
                  </div>

                  {{-- fallback kalau semua kosong --}}
                  @if (!collect($images)->filter()->count())
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        class="img-fluid my-3">
                  @endif
                
                <article class="my-5 fs-5">
                    {!! $post->body !!}
    
            </article>
        </div>
    </div>
</div>

@endsection
<div class="container">
    <div class="row justify-conten-center mb-5">
        <div class="col-md-8">
            <h2 class="mb-5">{{ $post->tittle }}</h2>
            
                <p>By. <a href="/blog?authors={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                  @else
                  <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                  @endif

                {{-- <img src="https://source.unsplash.com/random/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid"> --}}
                
                <article class="my-5 fs-5">
                    {!! $post->body !!}

                <a href="/blog">Back to post</a>
            </article>
        </div>
    </div>
</div>
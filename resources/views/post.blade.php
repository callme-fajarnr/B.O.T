@extends('layout.main')

@section('container')
    @foreach ($namecom as $name)
        <div class="px-3">
            <div class="text-left bg-body-dark">
                <div class="py-lg-5">
                    <h1 class="display-2 fw-bold">{{ $name->namecompany }}</h1>
                    <h3 class="fw-normal text-muted mb-3">{{ $name->takeline }}</h3>
                </div>
            </div>
        </div>
    @endforeach

    {{-- 792 --}}
    @if ($post->skip(2)->count())
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-8">

                    @for ($i = 0; $i < 2; $i++)
                        <div class="col-0">
                            <a href="/blog/{{ $post[$i]->slug }}">
                                <div class="image-portrait">
                                    @if ($post[$i]->image)
                                        <img src="{{ asset('storage/' . $post[$i]->image) }}" class="img-fluid img-792">
                                    @else
                                        <img src="https://picsum.photos/792/594?{{ $post[$i]->category->name }}"
                                            class="card-img-top img-792">
                                    @endif
                                </div>
                                <div class="card-body">
                                    <p>{{ $post[$i]->excerpt }}</p>
                                    <h3>{{ $post[$i]->tittle }}</h3>
                                </div>
                            </a>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    @endif

    {{-- 512 TALL --}}
    @if ($post->skip(3)->count())
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">

                    @for ($i = 2; $i <= 4; $i++)
                        <div class="col">
                            <a href="/blog/{{ $post[$i]->slug }}">
                                @if ($post[$i]->image)
                                    <img src="{{ asset('storage/' . $post[$i]->image) }}" class="img-fluid img-512-tall">
                                @else
                                    <img src="https://picsum.photos/512/683?{{ $post[$i]->category->name }}"
                                        class="card-img-top img-512-tall">
                                @endif
                                <div class="card-body">
                                    <p>{{ $post[$i]->excerpt }}</p>
                                    <h3>{{ $post[$i]->tittle }}</h3>
                                </div>
                            </a>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    @endif

    {{-- 1680 --}}
    @if ($post->skip(5)->count())
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row">
                    <div class="col-0">
                        <a href="/blog/{{ $post[5]->slug }}">
                            @if ($post[5]->image)
                                <img src="{{ asset('storage/' . $post[5]->image) }}" class="img-fluid w-100">
                            @else
                                <img src="https://picsum.photos/1680/1120?{{ $post[5]->category->name }}"
                                    class="img-fluid w-100">
                            @endif
                            <div class="card-body">
                                <p>{{ $post[5]->excerpt }}</p>
                                <h3>{{ $post[5]->tittle }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- 512 TALL --}}
    @if ($post->skip(8)->count())
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">

                    @for ($i = 6; $i <= 8; $i++)
                        <div class="col">
                            <a href="/blog/{{ $post[$i]->slug }}">
                                @if ($post[$i]->image)
                                    <img src="{{ asset('storage/' . $post[$i]->image) }}" class="img-fluid img-512-tall">
                                @else
                                    <img src="https://picsum.photos/512/683?{{ $post[$i]->category->name }}"
                                        class="card-img-top img-512-tall">
                                @endif
                                <div class="card-body">
                                    <p>{{ $post[$i]->excerpt }}</p>
                                    <h3>{{ $post[$i]->tittle }}</h3>
                                </div>
                            </a>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    @endif

    {{-- 512 SHORT --}}
    @if ($post->skip(13)->count())
        <div class="album py-5 bg-body-dark">
            <div class="px-3">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">

                    @for ($i = 10; $i <= 12; $i++)
                        <div class="col">
                            <a href="/blog/{{ $post[$i]->slug }}">
                                @if ($post[$i]->image)
                                    <img src="{{ asset('storage/' . $post[$i]->image) }}" class="img-512-short">
                                @else
                                    <img src="https://picsum.photos/512/384?{{ $post[$i]->category->name }}"
                                        class="img-512-short">
                                @endif
                                <div class="card-body">
                                    <p>{{ $post[$i]->excerpt }}</p>
                                    <h3>{{ $post[$i]->tittle }}</h3>
                                </div>
                            </a>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-end">
        {{ $post->links() }}
    </div>
@endsection

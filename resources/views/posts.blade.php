@extends('layout.main')

@section('container')

@php
    $videoId = null;

    if ($post->link) {
        if (str_contains($post->link, 'watch?v=')) {
            parse_str(parse_url($post->link, PHP_URL_QUERY), $query);
            $videoId = $query['v'] ?? null;
        } elseif (str_contains($post->link, 'youtu.be/')) {
            $videoId = basename(parse_url($post->link, PHP_URL_PATH));
        } else {
            $videoId = $post->link; // kalau memang sudah ID
        }
    }
@endphp

{{-- ================= HERO ================= --}}
<div class="container-fluid px-2 px-md-4 pt-0 pb-4 mt-0">
    <div class="row align-items-stretch g-4">

        {{-- TEXT --}}
        <div class="col-12 col-md-6 d-flex flex-column justify-content-between">

        {{-- LOGO / IMAGE KECIL --}}
        @if($company && $company->logo)
        <div>
            <img 
                src="{{ asset('storage/'.$company->logo) }}" 
                class="logo-company"
                alt="logo">
        </div>
        @endif

        {{-- TEXT BAWAH --}}
        <div>
            <h3>{{ $post->tittle }}</h3>
            <p>{{ $post->excerpt }}</p>

            <p class="mb-1">
            <a href="/blog?category={{ $post->category->slug }}">
                {{ $post->category->name }}
            </a>
            </p>

            <p>
            <a href="/blog?authors={{ $post->author->username }}">
                {{ $post->author->name }}
            </a>
            </p>
        </div>

        </div>

        {{-- IMAGE --}}
        <div class="col-12 col-md-6">
            <div class="image-portrait">
                <img 
                    src="{{ $post->image ? asset('storage/'.$post->image) : 'https://picsum.photos/840/868' }}" 
                    alt="">
            </div>
        </div>

    </div>
    </div>


    {{-- ================= HEADLINE ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <h3 class="text-muted">{{ $post->excerpt }}</h3>
    </div>


    {{-- ================= FULL IMAGE ================= --}}
    @if($post->image4)
    <div class="container-fluid px-0">
        <div class="image-landscape">
        <img 
            src="{{ $post->image4 ? asset('storage/'.$post->image4) : 'https://picsum.photos/1280/720' }}" 
            alt="">
        </div>
    </div>
    @endif


    {{-- ================= DESCRIPTION ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <p>{{ $post->excerpt }}</p>
    </div>


    {{-- ================= 2 IMAGE ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <div class="row g-3">

        <div class="col-12 col-md-6">
            <div class="image-portrait">
            <img 
                src="{{ $post->image5 ? asset('storage/'.$post->image5) : 'https://picsum.photos/840/868' }}" 
                alt="">
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="image-portrait">
            <img 
                src="{{ $post->image5 ? asset('storage/'.$post->image5) : 'https://picsum.photos/840/868' }}" 
                alt="">
            </div>
        </div>

    </div>
    </div>


    {{-- ================= IMAGE + VIDEO ================= --}}
    <div class="container-fluid px-2 px-md-4 py-5">
    <div class="row g-4 align-items-start">

        {{-- IMAGE --}}
        <div class="col-12 col-md-6">
            <div class="image-portrait">
            <img 
                src="{{ $post->image2 ? asset('storage/'.$post->image2) : 'https://picsum.photos/840/868' }}" 
                alt="">
            </div>
        </div>

        {{-- VIDEO + TEXT --}}
        <div class="col-12 col-md-6">

        <h3>{{ $post->tittle }}</h3>

        {{-- VIDEO --}}
        @if($post->video)
            <video autoplay muted loop class="w-100 rounded my-3">
                <source src="{{ asset('storage/'.$post->video) }}" type="video/mp4">
            </video>

        @elseif($videoId)
            <div class="ratio ratio-16x9 my-3">
                <iframe 
                    src="https://www.youtube.com/embed/{{ $videoId }}?autoplay=1&mute=1&loop=1&playlist={{ $videoId }}"
                    allow="autoplay; encrypted-media"
                    allowfullscreen>
                </iframe>
            </div>
        @endif

        <p>{{ $post->excerpt }}</p>

        <p class="mb-1">{{ $post->category->name }}</p>
        <p>{{ $post->author->name }}</p>

        </div>

    </div>
    </div>


    {{-- ================= CLIENT ================= --}}
    @php
    $hasClient =
    $post->videoeditby || $post->photoby || $post->aktor1 || $post->aktor2 || $post->aktor3;
    @endphp

    @if($hasClient)
    <div class="container py-5 text-center">
    <h3>Our Clients</h3>

    <div class="row justify-content-center mt-4 g-3">

        @if($post->videoeditby)
        <div class="col-6 col-md-3">
        <h6>Video & Edit</h6>
        {!! $post->igvideo ? "<a href='$post->igvideo'>$post->videoeditby</a>" : $post->videoeditby !!}
        </div>
        @endif

        @if($post->photoby)
        <div class="col-6 col-md-3">
        <h6>Photos</h6>
        {!! $post->igphoto ? "<a href='$post->igphoto'>$post->photoby</a>" : $post->photoby !!}
        </div>
        @endif

        @if($post->aktor1)
        <div class="col-6 col-md-3">
        <h6>Actor 1</h6>
        {!! $post->igaktor1 ? "<a href='$post->igaktor1'>$post->aktor1</a>" : $post->aktor1 !!}
        </div>
        @endif

        @if($post->aktor2)
        <div class="col-6 col-md-3">
        <h6>Actor 2</h6>
        {!! $post->igaktor2 ? "<a href='$post->igaktor2'>$post->aktor2</a>" : $post->aktor2 !!}
        </div>
        @endif

        @if($post->aktor3)
        <div class="col-6 col-md-3">
        <h6>Actor 3</h6>
        {!! $post->igaktor3 ? "<a href='$post->igaktor3'>$post->aktor3</a>" : $post->aktor3 !!}
        </div>
        @endif

    </div>
</div>
@endif

@endsection
@extends('layout.main')

@section('container')

{{-- ================= HERO / INTRO ================= --}}
<div class="container-fluid px-2 px-md-4 py-4">
    <div class="row align-items-stretch g-4">

        {{-- TEXT --}}
        <div class="col-12 col-md-6 d-flex flex-column justify-content-between">

        {{-- IMAGE 100x100 (TOP) --}}
        <div>
            <img src="https://picsum.photos/100/100?" class="d-block" alt="">
        </div>

        {{-- TEXT (BOTTOM) --}}
        <div>
            <h3>A first Push into a more sustainable Future</h3>

            <p>
            We produced the campaign for the ‘Puig PK Primeblue’, the first shoe by adidas Skateboarding made in part with Parley ocean plastic.
            </p>

            <p class="mb-1">category</p>
            <p>Parley ocean plastic.</p>
        </div>

        </div>

        {{-- IMAGE --}}
        <div class="col-12 col-md-6">
        <img src="https://picsum.photos/840/868?" 
            class="img-fluid w-100 rounded" 
            alt="">
        </div>

    </div>
    </div>


    {{-- ================= TEXT ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <h3 class="text-muted">Build anything you want with Aperture</h3>
    </div>


    {{-- ================= FULL IMAGE ================= --}}
    <div class="container-fluid px-0">
    <img src="https://picsum.photos/1280/720?" 
        class="img-fluid w-100" 
        alt="">
    </div>


    {{-- ================= DESCRIPTION ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <p>
        This is a wider card with supporting text below as a natural lead-in to additional content. 
        This content is a little bit longer.
    </p>
    </div>


    {{-- ================= 2 IMAGE GRID ================= --}}
    <div class="container-fluid px-2 px-md-4 py-4">
    <div class="row g-3">

        <div class="col-12 col-md-6">
        <img src="https://picsum.photos/840/868?" class="img-fluid w-100" alt="">
        </div>

        <div class="col-12 col-md-6">
        <img src="https://picsum.photos/840/868?" class="img-fluid w-100" alt="">
        </div>

    </div>
    </div>


    {{-- ================= IMAGE + TEXT + YOUTUBE ================= --}}
    <div class="container-fluid px-2 px-md-4 py-5">
    <div class="row align-items-start g-4">

        {{-- IMAGE --}}
        <div class="col-12 col-md-6">
        <img src="https://picsum.photos/840/868?" class="img-fluid w-100" alt="">
        </div>

        {{-- TEXT + VIDEO --}}
        <div class="col-12 col-md-6">

        <h3>A first Push into a more sustainable Future</h3>

        {{-- YOUTUBE (SMALL + AUTOPLAY) --}}
        <div class="ratio ratio-16x9 my-3 w-100">
        <iframe 
            src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&mute=1&loop=1&playlist=VIDEO_ID"
            title="YouTube video"
            allow="autoplay; encrypted-media"
            allowfullscreen>
        </iframe>
        </div>

        <p>
            We produced the campaign for the ‘Puig PK Primeblue’, the first shoe by adidas Skateboarding made in part with Parley ocean plastic.
        </p>

        <p class="mb-1">category</p>
        <p>Parley ocean plastic.</p>

        </div>

    </div>
    </div>


    {{-- ================= CLIENT INFO ================= --}}
    <div class="container py-5 text-center">
    <h3>Our Clients</h3>

    <div class="row justify-content-center mt-4 g-3">

        <div class="col-6 col-md-3">
        <h6>Video & Edit by</h6>
        <a href="#">Robin Pailler</a>
        </div>

        <div class="col-6 col-md-3">
        <h6>Photos by</h6>
        <a href="#">Marcel Boer</a>
        </div>

        <div class="col-6 col-md-3">
        <h6>Actor 1</h6>
        <a href="#">Shawny Sander</a>
        </div>

        <div class="col-6 col-md-3">
        <h6>Actor 2</h6>
        <a href="#">Shawny Sander</a>
        </div>

        <div class="col-6 col-md-3">
        <h6>Actor 3</h6>
        <a href="#">Shawny Sander</a>
        </div>

    </div>
</div>

@endsection

@extends('layout.main')

@section('container')

<div class="px-lg-3">
  <div class="text-left bg-body-dark">
    <div class="py-lg-5">
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
        </a>
      </div>

      <div class="py-lg-5">
        <h1>{{ $about->line_1 }}</h1>
      </div>
    </div>
  </div>
</div>

<div class="px-lg-5 py-lg-5">
  <div class="text-left bg-body-dark">
    <div class="px-lg-5 py-lg-5">
      <h3 class="fw-normal text-muted mb-3">{{ $about->line_2  }}</h3>
    </div>
  </div>
</div>

<div class="album py-lg-5 bg-body-dark">
  <div class="px-lg-5">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">
      <div class="col">
        <a href="">
          <div class="card-body">
            <h3>SOLO & SIGHT</h3>
            <p class="card-text py-lg-5">{{ $about->solo_sight }}</p>
          </div>
         
        </a>
      </div>
      <div class="col">
        <a href="/blog/{{ $post[0]->slug }}">
          @if ($post[0]->image)
            <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->category->name }}" class="img-fluid" width="447px" height="595px">
            @else
                <img src="https://picsum.photos/512/683?{{ $post[0]->category->name }}" class="card-img-top" alt="..." width="447px" height="595px">
            @endif
          <div class="card-body">
            <p class="card-text">{{ $post[0]->excerpt }}</p>
            <h3>{{ $post[0]->tittle }}</h3>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="/blog/{{ $post[1]->slug }}">
          @if ($post[1]->image)
            <img src="{{ asset('storage/' . $post[1]->image) }}" alt="{{ $post[1]->category->name }}" class="img-fluid" width="447px" height="595px">
            @else
                <img src="https://picsum.photos/512/683?{{ $post[1]->category->name }}" class="card-img-top" alt="..." width="447px" height="595px">
            @endif
          <div class="card-body">
            <p class="card-text">{{ $post[1]->excerpt }}</p>
            <h3>{{ $post[1]->tittle }}</h3>
          </div>
        </a>
      </div>
    </div>

  </div>
</div>

<div class="px-lg-5 py-lg-5">
  <div class="text-left bg-body-dark py-lg-5">
    <div class="px-lg-5">
      <h3 class="fw-normal text-muted mb-3">{{ $about->line_3 }}</h3>
    </div>
  </div>
</div>

<a href="/blog">
  <div class="album py-lg-5 bg-body-dark">
    <div class="px-lg-3">
  
      <div class="row row-cols-sm-1 row-cols-md-1 g-1">
        <div class="col-0">
          <div class="card text-bg-dark text-white">
            @if ($about->image_about)
              <img src="{{ asset('storage/' . $about->image_about) }}" class="card-img-top" width="1680" height="1120" alt="Image from DB">
            @else
              <img src="https://picsum.photos/1680/1120" class="card-img-top" width="1680" height="1120" alt="Fallback Image">
            @endif
            <div class="card-img-overlay d-flex align-content-center flex-wrap">
              <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight px-lg-5">
                  <h4 class="card-title text-left flex-center px-lg-5">See ur latest work</h4>
                  <h2 class="card-title text-left flex-center px-lg-5">THING WE DID IN THE PAST</h2>
                  <h2 class="card-title text-left flex-center px-lg-5 py-lg-5 text-decoration-underline">OUR PROJECT</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</a>

@endsection

{{-- backup home --}}
{{-- @extends('layout.main')

@section('container')
<img src="https://source.unsplash.com/random/1280x720" alt="" srcset="" height="100%" width="100%">

<div class="px-3">
  <div class="text-left bg-body-dark">
    <div class="py-5">
      <div class="d-flex gap-3 justify-content-center lead fw-normal">
        <a class="icon-link" href="#">
          Learn more
          <svg class="bi"><use xlink:href="#chevron-right"/></svg>
        </a>
      </div>

      <div class="py-5">
        <h1 class="display-2 fw-bold">POUR PICTURES</h1>
        <h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
      </div>
    </div>
  </div>
</div>

<div class="album py-5 bg-body-dark">
  <div class="px-3">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">
      <div class="col">
        <a href="">
          <img src="https://source.unsplash.com/random/512x683" class="bd-placeholder-img card-img-top" width="512px" height="683px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <img src="https://source.unsplash.com/random/512x683" class="bd-placeholder-img card-img-top" width="512px" height="683px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
      <div class="col">
        <a href="">
          <img src="https://source.unsplash.com/random/512x683" class="bd-placeholder-img card-img-top" width="512px" height="683px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
    </div>

  </div>
</div>

<div class="album py-5 bg-body-dark">
  <div class="px-3">

    <div class="row row-cols-5 row-cols-sm-2 row-cols-md-2 g-5">
      <div class="col-0">
        <a href="">
          <img src="https://source.unsplash.com/random/792x594" class="bd-placeholder-img card-img-top" width="792px" height="594px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
      <div class="col-0">
        <a href="">
          <img src="https://source.unsplash.com/random/792x594" class="bd-placeholder-img card-img-top" width="792px" height="594px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
    </div>
    
  </div>
</div>

<div class="album py-5 bg-body-dark">
  <div class="px-3">

    <div class="row row-cols-sm-1 row-cols-md-1 g-1">
      <div class="col-0">
        <a href="">
          <img src="https://source.unsplash.com/random/1680x1120" class="bd-placeholder-img card-img-top" width="1680px" height="1120px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
    </div>
    
  </div>
</div>

<div class="px-lg-5">
  <div class="text-left bg-body-dark">
    <div class="px-lg-5">
      <h3 class="fw-normal text-muted mb-3">From bespoke content to international campaigns, our experience covers a range of creative concepts and spans the cultural landscape.</h3>
      <h3 class="fw-normal text-muted mb-3">Build anything you want with Aperture</h3>
      <a class="icon-link" href="#">
        About Us
        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
      </a>
      <a class="icon-link" href="#">
        All Project
        <svg class="bi"><use xlink:href="#chevron-right"/></svg>
      </a>
    </div>
  </div>
</div>

<div class="py-lg-5">
  <div class="px-3 text-center">
    <div class="container text-center">
      <h3>Our Clients</h3>
      <div class="row align-items-start py-lg-5">
        <div class="row row-cols-5">
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
        </div>
        <div class="row row-cols-5 py-lg-5">
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
        </div>
        <div class="row row-cols-5 py-lg-1">
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
          <div class="col"><img src="https://source.unsplash.com/random/100x100"></div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection --}}



{{-- @dd($post) --}}
@extends('layout.main')

@section('container')

{{-- coba fajar --}}

<img src="https://picsum.photos/1280/700?" alt="" srcset="" height="100%" width="100%">

<div class="px-3">
 <div class="text-left bg-body-dark">
  <div class="py-5">
   <div class="d-flex gap-3 justify-content-center lead fw-normal">
    <a class="icon-link" href="#">
     Learn more
     <svg class="bi">
      <use xlink:href="#chevron-right" />
     </svg>
    </a>
   </div>

   @foreach ($namecom as $name)
   <div class="py-5">
    <h1 class="display-2 fw-bold">{{ $name->namecompany }}</h1>
    <h3 class="fw-normal text-muted mb-3">{{ $name->takeline }}</h3>
   </div>
   @endforeach
  </div>
 </div>
</div>

@if ($post->skip(3)->count())
<div class="album py-5 bg-body-dark">
 <div class="px-3">

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-8">
   <div class="col">
    <a href="/blog/{{ $post[0]->slug }}">
     @if ($post[0]->image)
     <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->category->name }}" class="img-fluid" width="512px" height="683px">
     @else
     <img src="https://picsum.photos/512/683?{{ $post[0]->category->name }}" class="card-img-top" alt="..." width="512px" height="683px">
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
     <img src="{{ asset('storage/' . $post[1]->image) }}" alt="{{ $post[1]->category->name }}" class="img-fluid" width="512px" height="683px">
     @else
     <img src="https://picsum.photos/512/683?{{ $post[1]->category->name }}" class="card-img-top" alt="..." width="512px" height="683px">
     @endif
     <div class="card-body">
      <p class="card-text">{{ $post[1]->excerpt }}</p>
      <h3>{{ $post[1]->tittle }}</h3>
     </div>
    </a>
   </div>
   <div class="col">
    <a href="/blog/{{ $post[2]->slug }}">
     @if ($post[2]->image)
     <img src="{{ asset('storage/' . $post[2]->image) }}" alt="{{ $post[2]->category->name }}" class="img-fluid" width="512px" height="683px">
     @else
     <img src="https://picsum.photos/512/683?{{ $post[2]->category->name }}" class="card-img-top" alt="..." width="512px" height="683px">
     @endif
     <div class="card-body">
      <p class="card-text">{{ $post[2]->excerpt }}</p>
      <h3>{{ $post[2]->tittle }}</h3>
     </div>
    </a>
   </div>
  </div>

 </div>
</div>
@endif

@if ($post->skip(5)->count())
<div class="album py-5 bg-body-dark">
 <div class="px-3">

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 g-8">
   <div class="col-0">
    <a href="/blog/{{ $post[4]->slug }}">
     @if ($post[4]->image)
     <img src="{{ asset('storage/' . $post[4]->image) }}" alt="{{ $post[4]->category->name }}" class="img-fluid" width="792px" height="594px">
     @else
     <img src="https://picsum.photos/792/594?{{ $post[4]->category->name }}" class="card-img-top" alt="{{ $post[4]->category->name }}" width="792px" height="594px">
     @endif
     <div class="card-body">
      <p class="card-text">{{ $post[4]->excerpt }}</p>
      <h3>{{ $post[4]->tittle }}</h3>
     </div>
    </a>
   </div>
   <div class="col-0">
    <a href="/blog/{{ $post[5]->slug }}">
     @if ($post[5]->image)
     <img src="{{ asset('storage/' . $post[5]->image) }}" alt="{{ $post[5]->category->name }}" class="img-fluid" width="792px" height="594px">
     @else
     <img src="https://picsum.photos/792/594?{{ $post[5]->category->name }}" class="card-img-top" alt="{{ $post[5]->category->name }}" width="792px" height="594px">
     @endif
     <div class="card-body">
      <p class="card-text">{{ $post[5]->excerpt }}</p>
      <h3>{{ $post[5]->tittle }}</h3>
     </div>
    </a>
   </div>

  </div>
 </div>
 @endif

 <div class="album py-5 bg-body-dark">
  <div class="px-3">

   <div class="row row-cols-sm-1 row-cols-md-1 g-8">
    @foreach($post->skip(5) as $posts)
    <div class="col-0">
     <a href="/blog/{{ $posts->slug }}">
      @if ($posts->image)
      <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->category->name }}" class="img-fluid" width="1680px" height="1120px">
      @else
      <img src="https://picsum.photos/1680/1120?{{ $posts->category->name }}" class="card-img-top" alt="{{ $posts->category->name }}" width="1680px" height="1120px">
      @endif
      <div class="card-body">
       <p class="card-text">{{ $posts->excerpt }}</p>
       <h3>{{ $posts->tittle }}</h3>
      </div>
     </a>
    </div>
    @endforeach
    {{-- <div class="col-0">
        <a href="">
          <img src="https://source.unsplash.com/random/1680x1120" class="bd-placeholder-img card-img-top" width="1680px" height="1120px" alt="" srcset="">
          <div class="card-body">
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <h3>judul</h3>
          </div>
        </a>
      </div>
    </div> --}}

   </div>
  </div>

  <div class="px-5">
   <div class="text-left bg-body-dark">
    <div class="px-5">
     @foreach ($namecom as $name)
     <h3 class="fw-normal text-muted mb-3">{{ $name->deccompany }}</h3>
     <h3 class="fw-normal text-muted mb-3">{{ $name->takeline }}</h3>
     @endforeach
     <a class="icon-link" href="/about">
      About Us
      <svg class="bi">
       <use xlink:href="#chevron-right" />
      </svg>
     </a>
     <a class="icon-link" href="/blog">
      All Project
      <svg class="bi">
       <use xlink:href="#chevron-right" />
      </svg>
     </a>
    </div>
   </div>
  </div>


  <div class="album py-5 bg-body-dark">
   <div class="px-0">
    <h3 class="text-center mb-3">Our Clients</h3>

    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
     <div class="carousel-inner">
      @foreach($categories->chunk(3) as $chunkIndex => $categoryChunk)
      <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
       <div class="row justify-content-center g-0">
        @foreach($categoryChunk as $category)
        <div class="col-12 col-sm-6 col-md-4 d-flex justify-content-center px-0 mb-3">
         <a href="/blog?category={{ $category->slug }}" class="w-100">
          <div class="card w-100">
           @if ($category->image)
           <img src="{{ asset('storage/' . $category->image) }}" class="card-img-top border-0" alt="{{ $category->name }}">
           @else
           <img src="https://picsum.photos/512/450?{{ $category->name }}" class="card-img-top border-0" alt="{{ $category->name }}">
           @endif
           <div class="card-body">
            <h5 class="card-text">{{ $category->name }}</h5>
           </div>
          </div>
         </a>
        </div>
        @endforeach
       </div>
      </div>
      @endforeach
     </div>

     <!-- Controls -->
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
     </button>
    </div>
   </div>
   <hr class="border border-2 opacity-75">
  </div>




  {{-- <div class="py-5">
  <div class="px-3 text-center">
    <div class="container text-center">
      <h3>Our Clients</h3>
      <div class="row align-items-start py-lg-5">
        @foreach($categories as $category)
        <div class="col-md-4">
            <a href="/blog?category={{ $category->slug }}">
  <div class="card text-bg-dark text-white">
   @if ($category->image)
   <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="card-img">
   @else
   <img src="https://picsum.photos/80/80?{{ $category->name }}" class="card-img" alt="{{ $category->name }}">
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
</div>
</div> --}}
@endsection
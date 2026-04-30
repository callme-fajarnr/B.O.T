@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>

<div class="col-lg-10">
<form action="/dashboard/post/{{ $post->slug }}" method="POST" enctype="multipart/form-data">
@method('put')
@csrf

<div class="row">

  {{-- Title --}}
  <div class="col-md-6 mb-3">
    <label class="form-label">Title</label>
    <input type="text" id="tittle"
      class="form-control @error('tittle') is-invalid @enderror"
      name="tittle"
      value="{{ old('tittle', $post->tittle) }}">
  </div>

  {{-- Slug --}}
  <div class="col-md-6 mb-3">
    <label class="form-label">Slug</label>
    <input type="text" id="slug"
      class="form-control @error('slug') is-invalid @enderror"
      name="slug"
      value="{{ old('slug', $post->slug) }}">
  </div>

  {{-- Category --}}
  <div class="col-md-6 mb-3">
    <label class="form-label">Category</label>
    <select class="form-select" name="category_id">
      @foreach ($categories as $category)
        <option value="{{ $category->id }}"
          {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
          {{ $category->name }}
        </option>
      @endforeach
    </select>
  </div>

  {{-- Video --}}
  <div class="col-md-6 mb-3">
    <label class="form-label">Video</label>
    <input type="hidden" name="oldVideo" value="{{ $post->video }}">

    @if($post->video)
      <video src="{{ asset('storage/'.$post->video) }}"
        class="video-preview img-fluid mb-2"
        style="max-height:200px;" controls></video>
    @else
      <video class="video-preview img-fluid mb-2" style="display:none;"></video>
    @endif

    <input type="file" class="form-control" id="video" name="video"
      onchange="previewVideo()">
  </div>

  {{-- YOUTUBE LINK --}}
    <div class="col-12 mb-3">
        <label class="form-label">Youtube Link (optional)</label>
        <input type="text" class="form-control" name="link" value="{{ old('link', $post->link) }}">
    </div>

  {{-- Images --}}
  @for ($i = 1; $i <= 5; $i++)
  @php
    $imgField = $i == 1 ? 'image' : 'image'.$i;
  @endphp

  <div class="col-md-6 mb-3">
    <label class="form-label">Image {{ $i }}</label>

    <input type="hidden" name="oldImage{{ $i }}" value="{{ $post->$imgField }}">

    {{-- preview lama --}}
    @if ($post->$imgField)
      <img src="{{ asset('storage/'.$post->$imgField) }}"
        class="img-preview{{ $i }} img-fluid mb-2"
        style="max-height:200px;">
    @else
      <img class="img-preview{{ $i }} img-fluid mb-2" style="display:none;">
    @endif

    {{-- input --}}
    <input type="file"
      class="form-control"
      id="image{{ $i }}"
      name="{{ $imgField }}"
      onchange="previewImage({{ $i }})">
  </div>
  @endfor

  {{-- Body --}}
  <div class="col-12 mb-3">
    <label class="form-label">Body</label>
    <input id="body" type="hidden" name="body"
      value="{{ old('body', $post->body) }}">
    <trix-editor input="body"></trix-editor>
  </div>

  {{-- Credit --}}
  <div class="col-md-6 mb-3">
    <label class="form-label">Video & Edit By</label>
    <input type="text" class="form-control mb-2"
      name="videoeditby"
      value="{{ old('videoeditby', $post->videoeditby) }}">
    <input type="text" class="form-control"
      name="igvideo"
      value="{{ old('igvideo', $post->igvideo) }}">
  </div>

  <div class="col-md-6 mb-3">
    <label class="form-label">Photos By</label>
    <input type="text" class="form-control mb-2"
      name="photoby"
      value="{{ old('photoby', $post->photoby) }}">
    <input type="text" class="form-control"
      name="igphoto"
      value="{{ old('igphoto', $post->igphoto) }}">
  </div>

  {{-- Actors --}}
  @for ($i = 1; $i <= 3; $i++)
  <div class="col-md-4 mb-3">
    <label class="form-label">Actor {{ $i }}</label>
    <input type="text" class="form-control mb-2"
      name="aktor{{ $i }}"
      value="{{ old('aktor'.$i, $post->{'aktor'.$i}) }}">
    <input type="text" class="form-control"
      name="igaktor{{ $i }}"
      value="{{ old('igaktor'.$i, $post->{'igaktor'.$i}) }}">
  </div>
  @endfor

</div>

<button type="submit" class="btn btn-primary">Update Post</button>
</form>
</div>

<script>
const tittle = document.querySelector('#tittle');
const slug = document.querySelector('#slug');

tittle.addEventListener('change', function(){
    fetch('/dashboard/post/checkSlug?tittle=' + tittle.value)
    .then(res => res.json())
    .then(data => slug.value = data.slug)
});

// preview image universal
function previewImage(i){
    const input = document.querySelector('#image'+i);
    const preview = document.querySelector('.img-preview'+i);

    preview.style.display = 'block';

    const reader = new FileReader();
    reader.readAsDataURL(input.files[0]);

    reader.onload = e => preview.src = e.target.result;
}

// preview video
function previewVideo(){
    const input = document.querySelector('#video');
    const preview = document.querySelector('.video-preview');

    preview.style.display = 'block';

    const reader = new FileReader();
    reader.readAsDataURL(input.files[0]);

    reader.onload = e => preview.src = e.target.result;
}
</script>
@endsection
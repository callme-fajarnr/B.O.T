@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Category</h1>
</div>

<div class="col-lg-8">
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="mb-3" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Name</label>
                    <input type="text"
                        class="form-control @error('name') is-invalid @enderror"
                        id="tittle" name="name"
                        value="{{ old('name', $category->name) }}" required autofocus>

                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="slug" class="form-label fw-semibold">Slug</label>
                    <input type="text"
                        class="form-control @error('slug') is-invalid @enderror"
                        id="slug" name="slug"
                        value="{{ old('slug', $category->slug) }}" required>

                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Logo Category</label>

                    <input type="hidden" name="oldImage" value="{{ $category->image }}">

                    <div class="mb-2">
                        @if ($category->image)
                            <img src="{{ asset('storage/' . $category->image) }}"
                                class="img-preview img-fluid rounded border d-block"
                                style="max-height: 180px;">
                        @else    
                            <img class="img-preview img-fluid rounded border d-none"
                                style="max-height: 180px;">
                        @endif
                    </div>

                    <input type="file"
                        class="form-control @error('image') is-invalid @enderror"
                        id="image" name="image"
                        onchange="previewImage()">

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Update Category
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
const tittle = document.querySelector('#tittle');
const slug = document.querySelector('#slug');

tittle.addEventListener('change', function(){
    fetch('/dashboard/post/checkSlug?tittle=' + tittle.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.classList.remove('d-none');

    const reader = new FileReader();
    reader.readAsDataURL(image.files[0]);

    reader.onload = function(e){
        imgPreview.src = e.target.result;
    }
}
</script>
@endsection
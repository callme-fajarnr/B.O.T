@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New About</h1>

    <a href="/dashboard/post/createembed" class="btn btn-outline-secondary btn-sm">
        Masuk Embed
    </a>
</div>

<div class="col-lg-10">
    <form action="/dashboard/about" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- LINE 1 --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Line 1</label>
                <input type="text" class="form-control @error('line_1') is-invalid @enderror" 
                    name="line_1" value="{{ old('line_1') }}" required>
                @error('line_1') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- LINE 2 --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Line 2</label>
                <input type="text" class="form-control @error('line_2') is-invalid @enderror" 
                    name="line_2" value="{{ old('line_2') }}" required>
                @error('line_2') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- LINE 3 --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Line 3</label>
                <input type="text" class="form-control @error('line_3') is-invalid @enderror" 
                    name="line_3" value="{{ old('line_3') }}" required>
                @error('line_3') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- SOLO --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Solo & Sight</label>
                <input type="text" class="form-control @error('solo_sight') is-invalid @enderror" 
                    name="solo_sight" value="{{ old('solo_sight') }}" required>
                @error('solo_sight') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- IMAGE FULL WIDTH --}}
            <div class="col-12 mb-3">
                <label class="form-label">Image About</label>

                <img class="img-preview img-fluid mb-3 rounded" 
                     style="display:none; max-height:200px;">

                <input type="file" 
                    class="form-control @error('image_about') is-invalid @enderror" 
                    name="image_about" 
                    onchange="previewImage_about()">

                @error('image_about')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Create About
        </button>
    </form>
</div>

<script>
function previewImage_about(){
    const image = document.querySelector('[name="image_about"]');
    const preview = document.querySelector('.img-preview');

    if(image.files[0]){
        preview.src = URL.createObjectURL(image.files[0]);
        preview.style.display = 'block';
    }
}
</script>
@endsection
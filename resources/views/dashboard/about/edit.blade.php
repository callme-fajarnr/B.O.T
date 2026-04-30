@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit About</h1>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <form action="/dashboard/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="row g-3">

                <!-- LEFT -->
                <div class="col-md-6">
                    <label class="form-label">Line 1</label>
                    <input type="text" class="form-control @error('line_1') is-invalid @enderror"
                        name="line_1" value="{{ old('line_1', $about->line_1) }}">
                    @error('line_1') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Line 2</label>
                    <input type="text" class="form-control @error('line_2') is-invalid @enderror"
                        name="line_2" value="{{ old('line_2', $about->line_2) }}">
                    @error('line_2') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Line 3</label>
                    <input type="text" class="form-control @error('line_3') is-invalid @enderror"
                        name="line_3" value="{{ old('line_3', $about->line_3) }}">
                    @error('line_3') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label">Solo & Sight</label>
                    <input type="text" class="form-control @error('solo_sight') is-invalid @enderror"
                        name="solo_sight" value="{{ old('solo_sight', $about->solo_sight) }}">
                    @error('solo_sight') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- IMAGE FULL WIDTH -->
                <div class="col-12">
                    <label class="form-label">Image About</label>

                    <input type="hidden" name="oldImage" value="{{ $about->image_about }}">

                    @if ($about->image_about)
                        <img src="{{ asset('storage/' . $about->image_about) }}"
                            class="img-preview img-fluid mb-3 d-block" style="max-height: 200px;">
                    @else
                        <img class="img-preview img-fluid mb-3 d-none" style="max-height: 200px;">
                    @endif

                    <input class="form-control @error('image_about') is-invalid @enderror"
                        type="file" id="image_about" name="image_about"
                        onchange="previewImage_about()">

                    @error('image_about')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary px-4">
                        Update About
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>

<script>
function previewImage_about(){
    const image = document.querySelector('#image_about');
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
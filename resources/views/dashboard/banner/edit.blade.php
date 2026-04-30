@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Banner</h1>
</div>

<div class="col-lg-10">
    <form action="/dashboard/banner/{{ $banner->id }}" method="POST" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

        <input type="hidden" name="oldImage" value="{{ $banner->image }}">

        <div class="row">

            {{-- TITLE --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Title</label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title', $banner->title) }}"
                    required>

                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- STATUS SWITCH --}}
            <div class="col-md-6 mb-3 d-flex align-items-end">
                <div class="form-check form-switch">
                    <input class="form-check-input"
                        type="checkbox"
                        id="is_active"
                        name="is_active"
                        {{ $banner->is_active ? 'checked' : '' }}>

                    <label class="form-check-label ms-2" id="labelSwitch">
                        {{ $banner->is_active ? 'Active' : 'Non Active' }}
                    </label>
                </div>
            </div>

            {{-- IMAGE --}}
            <div class="col-12 mb-3">
                <label class="form-label">Image Banner</label>

                {{-- PREVIEW IMAGE --}}
                @if ($banner->image)
                    <img src="{{ asset('storage/' . $banner->image) }}"
                        class="img-preview img-fluid mb-3 rounded d-block"
                        style="max-height:200px;">
                @else
                    <img class="img-preview img-fluid mb-3 rounded"
                        style="display:none; max-height:200px;">
                @endif

                <input type="file"
                    class="form-control @error('image') is-invalid @enderror"
                    name="image"
                    onchange="previewImage()">

                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Update Banner
        </button>
    </form>
</div>

{{-- SCRIPT --}}
<script>
function previewImage(){
    const image = document.querySelector('[name="image"]');
    const preview = document.querySelector('.img-preview');

    if(image.files[0]){
        preview.src = URL.createObjectURL(image.files[0]);
        preview.style.display = 'block';
    }
}

// 🔥 SWITCH LABEL
const switchInput = document.getElementById('is_active');
const label = document.getElementById('labelSwitch');

switchInput.addEventListener('change', function(){
    label.innerText = this.checked ? 'Active' : 'Non Active';
});
</script>

<style>
.form-switch .form-check-input {
    width: 3em;
    height: 1.5em;
    cursor: pointer;
}
</style>

@endsection
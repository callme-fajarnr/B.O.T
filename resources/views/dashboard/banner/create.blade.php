@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Banner</h1>
</div>

<div class="col-lg-10">
    <form action="/dashboard/banner" method="POST" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="row">

            {{-- TITLE --}}
            <div class="col-md-6 mb-3">
                <label class="form-label">Title</label>
                <input type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    name="title"
                    value="{{ old('title') }}"
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
                        role="switch"
                        id="is_active"
                        name="is_active"
                        checked>

                    <label class="form-check-label ms-2" id="labelSwitch">
                        Active
                    </label>
                </div>
            </div>

            {{-- IMAGE --}}
            <div class="col-12 mb-3">
                <label class="form-label">Image Banner</label>

                <img class="img-preview img-fluid mb-3 rounded"
                    style="display:none; max-height:200px;">

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
            Create Banner
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

// 🔥 SWITCH LABEL AUTO CHANGE
const switchInput = document.getElementById('is_active');
const label = document.getElementById('labelSwitch');

switchInput.addEventListener('change', function(){
    label.innerText = this.checked ? 'Active' : 'Non Active';
});
</script>

{{-- OPTIONAL CSS --}}
<style>
.form-switch .form-check-input {
    width: 3em;
    height: 1.5em;
    cursor: pointer;
}
</style>

@endsection
@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">New Name Company</h1>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">

        <form action="/dashboard/namecompany" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-3">

                <!-- NAME COMPANY -->
                <div class="col-md-6">
                    <label class="form-label">Name Company</label>
                    <input type="text"
                        class="form-control @error('namecompany') is-invalid @enderror"
                        id="namecompany"
                        name="namecompany"
                        value="{{ old('namecompany') }}"
                        required autofocus>

                    @error('namecompany')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- TAKE LINE -->
                <div class="col-md-6">
                    <label class="form-label">Take Line</label>
                    <input type="text"
                        class="form-control @error('takeline') is-invalid @enderror"
                        id="takeline"
                        name="takeline"
                        value="{{ old('takeline') }}"
                        required>

                    @error('takeline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- DESCRIPTION -->
                <div class="col-12">
                    <label class="form-label">Dec Company</label>
                    <textarea
                        class="form-control @error('deccompany') is-invalid @enderror"
                        id="deccompany"
                        name="deccompany"
                        rows="3"
                        required>{{ old('deccompany') }}</textarea>

                    @error('deccompany')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">
                        Create Post
                    </button>
                </div>

            </div>

        </form>

    </div>
</div>
@endsection
@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Banner</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8">
  {{ session('success') }}
</div>
@endif

<div class="row">
  <div class="col">
      <div class="card">
          <div class="card-header">
              <a href="/dashboard/banner/create" class="btn btn-primary mb-3">
                  Create Banner
              </a>
          </div>

          <div class="card-body">

              <div class="table-responsive">
                <table class="table table-hover table-listing">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($banner as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $item->title }}</td>

                            <td>
                                @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" width="100">
                                @else
                                    -
                                @endif
                            </td>

                            <!-- 🔥 STATUS TOGGLE -->
                            <td>
                                <form action="/dashboard/banner/{{ $item->id }}/toggle" method="POST">
                                    @csrf
                                    @method('patch')

                                    <div class="form-check form-switch m-0">
                                        <input class="form-check-input toggle-status"
                                            type="checkbox"
                                            {{ $item->is_active ? 'checked' : '' }}>
                                    </div>
                                </form>
                            </td>

                            <td>
                                <a href="/dashboard/banner/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="/dashboard/banner/{{ $item->id }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm border-0" onclick="return confirm('Are you sure?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
              </div>

          </div>
      </div>
  </div>
</div>

{{-- 🔥 AUTO SUBMIT --}}
<script>
document.querySelectorAll('.toggle-status').forEach(function(toggle){
    toggle.addEventListener('change', function(){
        this.closest('form').submit();
    });
});
</script>

{{-- 🔥 STYLE SWITCH --}}
<style>
.form-switch .form-check-input {
    width: 3em;
    height: 1.5em;
    cursor: pointer;
}
</style>

@endsection
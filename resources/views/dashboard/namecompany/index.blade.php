@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Name Company</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <a href="/dashboard/namecompany/create" class="btn btn-primary mb-3"> Create New</a>
                {{-- <a href="/dashboard/post/createlink" class="btn btn-primary mb-3"> Create New Post Link</a> --}}
            </div>
            <div class="card-body" v-cloak>
                <form @submit.prevent="">
                    <div class="row justify-content-md-between">
                        <div class="col col-lg-7 col-xl-5 form-group">
                            <div class="input-group">
                                <input class="form-control" placeholder="" v-model="search" />
                                <span class="input-group-append">
                                    <button type="button" class="btn btn-primary"><i class="fa fa-search"></i>&nbsp; Cari</button>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover table-listing">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name Company</th>
                                <th scope="col">Take Line</th>
                                <th scope="col">Dec Company</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($namecom as $name)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $name->namecompany }}</td>
                                <td><span class="text-muted">{{ $name->takeline }}</span></td>
                                <td style="max-width:250px;">
                                    <small class="text-muted">
                                        {{ Str::limit($name->deccompany, 60) }}
                                    </small>
                                </td>
                                <td>
                                    @if ($name->logo)
                                        <img src="{{ asset('storage/' . $name->logo) }}" width="100">
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="/dashboard/namecompany/{{ $name->id }}/edit" class="btn btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <form action="/dashboard/namecompany/{{ $name->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')">
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

@endsection
@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Add Category</h1>
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
              <a href="/dashboard/categories/create" class="btn btn-primary mb-3"> Create New Category</a>
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
                              <th scope="col">Name</th>
                              <th scope="col">Slug</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($categories as $cat)
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $cat->name }}</td>
                              <td>{{ $cat->slug }}</td>
                              <td>
                                  <a href="/dashboard/categories/{{ $cat->slug }}/edit" class="btn btn-warning">
                                      <i class="bi bi-pencil"></i>
                                  </a>

                                  <form action="/dashboard/categories/{{ $cat->slug }}" method="POST" class="d-inline">
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
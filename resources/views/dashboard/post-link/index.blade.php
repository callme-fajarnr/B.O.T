@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Post Link</h1>
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
              <a href="/dashboard/post-link/create" class="btn btn-primary mb-3"> Create New Post Link</a>
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

              <table class="table table-hover table-listing">
                  <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tittle</th>
                        <th scope="col">Category</th>
                        <th scope="col">Publishing at</th>
                        <th scope="col">Action</th>
                          
                          <th></th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($posts as $post)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $post->tittle }}</td>
                      <td>{{ $post->category->name }}</td>
                      <td>{{ $post->created_at }}</td>
                      <td>
                        <a href="/dashboard/post/{{ $post->slug }}" class="btn btn-info"><i class="bi bi-eye"></i></span></a>
                        <a href="/dashboard/post-link/{{ $post->slug }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></span></a>
                        <form action="/dashboard/post/{{ $post->slug }}" method="POST" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash3"></i></button>
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

@endsection
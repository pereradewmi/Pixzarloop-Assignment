@extends('backend.layout')
@section('title')
Dashboard
@endsection

@section('content')
<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Dashboard</h1>
<span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
<div class="card-group">
  <div class="card col-sm-12">
    <div class="card-img-top">
      <i class="bi bi-filetype-html"></i>
    </div>
    <div class="card-body">
      <h5 class="card-title">Books</h5>
      <p class="card-text">{{ $booksCount }}</p>
    </div>
  </div>
  <div class="card col-sm-12">
    <div class="card-img-top">
      <i class="bi bi-filetype-html"></i>
    </div>
    <div class="card-body">
      <h5 class="card-title">Authors</h5>
      <p class="card-text">{{ $authorsCount }}</p>
    </div>
  </div>
  <div class="card col-sm-12">
    <div class="card-img-top">
      <i class="bi bi-filetype-html"></i>
    </div>
    <div class="card-body">
      <h5 class="card-title">Categories</h5>
      <p class="card-text">{{ $categoriesCount }}</p>
    </div>
  </div>
</div>
@endsection
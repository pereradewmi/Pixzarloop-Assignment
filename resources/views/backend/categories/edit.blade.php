@extends('backend.layout')
@section('title')
    Edit Category
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Category</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $category->id }}" name="id">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Category</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a type="reset" class="btn btn-light btn-active-light-primary me-2" href="{{ route('categories') }}">Discard</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
@endsection
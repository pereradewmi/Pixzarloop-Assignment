@extends('backend.layout')
@section('title')
    Edit Authors
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Author</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form action="{{ route('author.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $author->id }}" name="id">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a type="reset" class="btn btn-light btn-active-light-primary me-2" href="{{ route('authors') }}">Discard</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
@endsection

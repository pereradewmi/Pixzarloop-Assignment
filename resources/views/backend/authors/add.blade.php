@extends('backend.layout')
@section('title')
Add Authors
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Authors</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form action="{{ route('author.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Author</button>
    </form>
@endsection

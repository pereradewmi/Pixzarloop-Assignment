@extends('backend.layout')
@section('title')
    Add Authors
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Authors</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form id="add-author" action="{{ route('author.create') }}" method="POST" enctype="multipart/form-data"
        data-parsley-validate>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" data-parsley-trigger="keyup"
                    data-parsley-minlength="2" 
                    data-parsley-maxlength="50" 
                    data-parsley-required="true"
                    data-parsley-required-message="Author name is required"
                    data-parsley-minlength-message="Please enter a Author name with at least 2 characters."
                    data-parsley-maxlength-message="Please enter a Author name with a maximum of 50 characters."
                    value="{{ old('name') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Author</button>
    </form>
@endsection

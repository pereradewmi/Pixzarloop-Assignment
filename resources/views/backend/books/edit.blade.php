@extends('backend.layout')

@section('title')
    Edit Books
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Books</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form id="edit-book-form" action="{{ route('book.update') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <input type="hidden" value="{{ $book->id }}" name="id">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    data-parsley-trigger="keyup" data-parsley-minlength="2" data-parsley-maxlength="100"
                    data-parsley-required="true" data-parsley-required-message="Title is required"
                    data-parsley-minlength-message="Please enter a title with at least 2 characters."
                    data-parsley-maxlength-message="Please enter a title with a maximum of 100 characters."
                    value="{{ $book->title }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author" id="author" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" 
                    data-hide-search="true" 
                    data-placeholder="Select Author" required
                    data-parsley-required="true" 
                    data-parsley-required-message="Author is required">
                    <option value="">Select Author</option>
                    @foreach ($data->author as $row)
                        <option value="{{ $row->id }}" @if ($book->author_id == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price"
                    data-parsley-trigger="keyup" 
                    data-parsley-minlength="1" 
                    data-parsley-type="digits"
                    data-parsley-required="true" 
                    data-parsley-required-message="Price is required"
                    data-parsley-minlength-message="Price must be at least 1 digit."
                    value="{{ $book->price }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" 
                    data-hide-search="true" 
                    data-placeholder="Select Category" required
                    data-parsley-required="true" 
                    data-parsley-required-message="Category is required">
                    <option value="">Select Category</option>
                    @foreach ($data->category as $row)
                        <option value="{{ $row->id }}" @if ($book->category_id == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"
                    data-parsley-required="true" data-parsley-required-message="Description is required">{{ $book->description }}</textarea>
            </div>
        </div>

        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a type="reset" class="btn btn-light btn-active-light-primary me-2" href="{{ route('books') }}">Discard</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
@endsection

@extends('backend.layout')

@section('title')
    Add Books
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Books</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form id="create-book-form" action="{{ route('book.create') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    data-parsley-trigger="keyup" 
                    data-parsley-minlength="2" 
                    data-parsley-maxlength="50"
                    data-parsley-required="true" 
                    data-parsley-required-message="Title is required"
                    data-parsley-minlength-message="Please enter a title with at least 2 characters."
                    data-parsley-maxlength-message="Please enter a title with a maximum of 50 characters."
                    value="{{ old('title') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author" id="author" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" 
                    data-hide-search="true" data-placeholder="Select Author" required
                    data-parsley-required="true" 
                    data-parsley-required-message="Author is required">
                    <option value="">Select Author</option>
                    @foreach ($data->author as $row)
                        <option value="{{ $row->id }}" @if (old('author') == $row->id) selected @endif>
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
                    value="{{ old('price') }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" data-hide-search="true" 
                    data-placeholder="Select Category" required
                    data-parsley-required="true" 
                    data-parsley-required-message="Category is required">
                    <option value="">Select Category</option>
                    @foreach ($data->category as $row)
                        <option value="{{ $row->id }}" @if (old('category') == $row->id) selected @endif>
                            {{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" 
                    data-parsley-required="true" 
                    data-parsley-required-message="Description is required">{{ old('description') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>

@endsection

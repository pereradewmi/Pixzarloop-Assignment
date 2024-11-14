@extends('backend.layout')

@section('title')
    Add Category
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Category</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form id="add-category" action="{{ route('category.create') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                    value="{{ old('name') }}" 
                    data-parsley-trigger="keyup" 
                    data-parsley-minlength="2" 
                    data-parsley-maxlength="50"
                    data-parsley-required="true" 
                    data-parsley-required-message="Category name is required"
                    data-parsley-minlength-message="Please enter a category name with at least 2 characters."
                    data-parsley-maxlength-message="Please enter a category name with a maximum of 50 characters.">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
@endsection

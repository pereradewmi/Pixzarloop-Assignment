@extends('backend.layout')
@section('title')
    Edit Books
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Edit Books</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form action="{{ route('book.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $book->id }}" name="id">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" data-hide-search="true" data-placeholder="Select Author"
                    data-select2-id="select2-data-71-3" tabindex="-1" aria-hidden="true">
                    @foreach ($data->author as $row)
                        <option @if ($book->author_id == $row->id) {{ 'selected' }} @endif value="{{ $row->id }}"
                            data-select2-id="select2-data-3-{{ $row->id }}">{{ $row->name }}
                        </option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" id="author" value="{{ old('author') }}"> --}}
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $book->price }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" data-hide-search="true" data-placeholder="Select Category"
                    data-select2-id="select2-data-71-3" tabindex="-1" aria-hidden="true">
                    @foreach ($data->category as $row)
                        <option @if ($book->category_id == $row->id) {{ 'selected' }} @endif value="{{ $row->id }}"
                            data-select2-id="select2-data-3-{{ $row->id }}">{{ $row->name }}
                        </option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" id="category" value="{{ old('category') }}"> --}}
            </div>
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $book->description }}">
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <a type="reset" class="btn btn-light btn-active-light-primary me-2" href="{{ route('books') }}">Discard</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
    {{-- <button type="submit" class="btn btn-danger">Discard</button> --}}
@endsection

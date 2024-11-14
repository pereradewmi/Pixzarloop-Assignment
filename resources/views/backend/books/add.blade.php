@extends('backend.layout')
@section('title')
Add Books
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Add Books</h1>
    <span class="h-20px ms-3 mx-2"></span>
    <form action="{{ route('book.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="name" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="author" class="form-label">Author</label>
                <select name="author"
                    class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" data-hide-search="true"
                    data-placeholder="Select Author" data-select2-id="select2-data-71-3"
                    tabindex="-1" aria-hidden="true">
                    @foreach ($data->author as $row)
                    <option @if(old('author')==$row->id) {{'selected'}} @endif
                        value="{{$row->id}}"
                        data-select2-id="select2-data-3-{{$row->id}}">{{$row->name}}
                    </option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" id="author" value="{{ old('author') }}"> --}}
            </div>
            <div class="col-md-6 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category"
                    class="form-select form-select-solid select2-hidden-accessible"
                    data-control="select2" data-hide-search="true"
                    data-placeholder="Select Category" data-select2-id="select2-data-71-3"
                    tabindex="-1" aria-hidden="true">
                    @foreach ($data->category as $row)
                    <option @if(old('category')==$row->id) {{'selected'}} @endif
                        value="{{$row->id}}"
                        data-select2-id="select2-data-3-{{$row->id}}">{{$row->name}}
                    </option>
                    @endforeach
                </select>
                {{-- <input type="text" class="form-control" id="category" value="{{ old('category') }}"> --}}
            </div>
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
@endsection

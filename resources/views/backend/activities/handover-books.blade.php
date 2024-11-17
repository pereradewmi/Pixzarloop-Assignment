@extends('backend.layout')
@section('title')
Hand Over Books
@endsection

@section('content')
    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Borrow Books</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Member Name</th>
                <th scope="col">Book Name</th>
                <th scope="col">Book Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $book)
                <tr>
                    <th class="text-start">{{ $key + 1 }}</th>
                    <td>{{ $book->member['name'] }}</td>
                    <td>{{ $book->book['title'] }}</td>
                    <td class="text-start">
                        @if ($book->book_status == 2)
                            <div class="badge badge-dark-success fw-bolder">handover</div>
                        @else
                            <div class="badge badge-dark-danger fw-bolder">borrow</div>
                        @endif
                    </td>
                    <td>
                        <form action="{{ url('/delete-book', $book->id) }}" method="POST" class="float-start">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                            fill="black"></path>
                                        <path opacity="0.5"
                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                            fill="black"></path>
                                        <path opacity="0.5"
                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

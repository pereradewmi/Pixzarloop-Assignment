@extends('backend.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-dark fw-bolder fs-3">Dashboard</h1>
            <a href="{{ route('admin.logout') }}" class="btn btn-outline-danger">Sign Out</a>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm h-100" style="background: #cbe4ff;">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <i class="bi bi-book fs-1 text-primary"></i>
                        </div>
                        <h5 class="card-title">Books</h5>
                        <p class="card-text fs-4 fw-bold">{{ $booksCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm h-100" style="background: #d3d0ff;">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <i class="bi bi-person-lines-fill fs-1 text-success"></i>
                        </div>
                        <h5 class="card-title">Authors</h5>
                        <p class="card-text fs-4 fw-bold">{{ $authorsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm h-100" style="background: #d5f5d4;">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <i class="bi bi-tags fs-1 text-warning"></i>
                        </div>
                        <h5 class="card-title">Categories</h5>
                        <p class="card-text fs-4 fw-bold">{{ $categoriesCount }}</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-4 mb-4">
                <div class="card text-center shadow-sm h-100" style="background: #d5f5d4;">
                    <div class="card-body">
                        <div class="card-icon mb-3">
                            <i class="bi bi-tags fs-1 text-warning"></i>
                        </div>
                        <h5 class="card-title">Members Activity</h5>
                        <p class="card-text fs-4 fw-bold">{{ $categoriesCount }}</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection

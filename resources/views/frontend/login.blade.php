@extends('frontend.layout')

@section('title')
    Login
@endsection

@section('content')
    <div class="page-header-area-2 gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-page">
                        <h1>Login</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content-area clearfix">
        <section class="section-padding no-top gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 col-sm-8">
                        <div class="form-group">
                            <form action="{{ route('authenticate') }}" method="POST">
                                @csrf
                                <div class="form-group mt-3">
                                    <label>Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Enter Email"
                                        required>
                                </div>
                                <div class="form-group mt-3">
                                    <label>Password</label>
                                    <input class="form-control" type="password" id="password" name="password"
                                        placeholder="Enter Password" required>
                                </div>
                                <button class="btn btn-theme btn-primary mt-5">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

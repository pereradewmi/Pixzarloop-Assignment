@extends('frontend.layout')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sx-12">
                <div class="row">
                    <div class="grid-style-4">
                        <div class="posts-masonry">
                            @foreach ($books as $book)
                                <div class="col-md-2 col-xs-12 col-sm-4">
                                    <div class="image">
                                        {{-- <div alt="Carspot"
                                            style="background-image:url({{ asset($book->image_path) }});
                                        height:250px; background-size:cover;background-position:center;
                                        position:relative;">
                                        </div> --}}
                                    </div>

                                    <div class="short-description-1 ">
                                        <h3 class="cut-text">
                                            <a href="#">{{ $book->title }}</a>
                                        </h3>
                                        <span class="ad-price">LKR {{ $book->price }}</span>
                                    </div>
                                    <div class="ad-info-1">
                                        <ul style="display: inline-flex; list-style: none; padding: 0; margin: 0;">
                                            @if (auth()->guard('customers')->check())
                                                <li><a href="{{ route('favorite.add', $book->id) }}" class="btn save-ad"><i
                                                            class="fa fa-heart" style="font-size: 15px;"></i></a>
                                                </li>
                                            @else
                                                <li><a href="{{ route('customer.login') }}" class="btn save-ad"><i
                                                            class="fa fa-heart" style="font-size: 15px;"></i></a>
                                                </li>
                                            @endif

                                            <li><a href="{{ route('add.to.cart') }}/{{ $book->id }}"
                                                    class="btn save-ad"><i class="fa fa-shopping-cart"
                                                        style="font-size: 15px;"></i></a>
                                            </li>

                                            <li><a href="{{ route('book-details', $book->id) }}" class="btn save-ad"><i
                                                        class="fa fa-eye" style="font-size: 15px;"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

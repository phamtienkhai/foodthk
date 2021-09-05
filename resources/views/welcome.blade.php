@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                @if (Route::has('login'))
                    @auth
                        <a href="/seller">Trang người bán</a>
                    @else
                        <a href="{{ route('login') }}">Trang người bán</a>
                    @endauth
                @endif

                <div class="title m-b-md text-center">
                    <h1>foodTHK</h1>
                </div>

                <div class="links">
                    <div class="text-center">
                        <a href="" class="menu-top">Cơm</a>
                        <a href="" class="menu-top">Cháo</a>
                        <a href="" class="menu-top">Phở</a>
                        <a href="" class="menu-top">Đồ Ăn Vặt</a>
                        <a href="" class="menu-top">Giải khát</a>
                    </div>
                </div>
            </div>
            <hr>
            <!-- boxes -->
            <div class="main-content">
                @foreach ($product as $item) 
                <div class="box">
                    <div class="box-wrapper">
                        <div class="box-top">
                            <img src="{{ asset('uploads/product/' .$item->image_product )}}" alt="Image">
                        </div>
                        <div class="box-bottom">
                            <div class="product-name">
                                {{ $item->title }}
                            </div>
                            <div class="product-price">
                                {{ $item->price }}
                            </div>
                        </div>
                    </div>
                    <p><a href="">dat hang</a></p>
                </div>
                @endforeach
            </div>
            <!-- end of boxes -->
        </div>
    </div>
@endsection

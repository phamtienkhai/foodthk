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
                        <a href="" class="menu-top">&nbsp;Cơm&nbsp;  </a>
                        <a href="" class="menu-top">&nbsp;Cháo&nbsp;</a>
                        <a href="" class="menu-top">&nbsp;Phở&nbsp;</a>
                        <a href="" class="menu-top">&nbsp;Đồ Ăn Vặt&nbsp;</a>
                        <a href="" class="menu-top">&nbsp;Giải khát&nbsp;</a>
                    </div>
                </div>
            </div>

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
                                <span>{{ $item->price }}</span>
                                <span>&#8363;</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div></div>
            </div>
            <!-- end of boxes -->
        </div>
    </div>
@endsection

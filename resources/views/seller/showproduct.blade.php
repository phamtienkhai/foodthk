@extends('..layouts.app')

@section('content')
<div id="seller-wrapper">
    <div id="seller-sidebar">
        @include('..layouts.ssb')
    </div>
    <div id="seller-main-content">
        <h1>show sản phẩm</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Giá</th>
                    <th colspan="2">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>
                    <td>
                        <img src="{{ asset('uploads/product/' .$item->image_product )}}" width="180px" height="140px"
                            alt="Image">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('seller.updateProduct')}}">Sửa</a>
                    </td>
                    <td>
                        <a href="">Xóa</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection

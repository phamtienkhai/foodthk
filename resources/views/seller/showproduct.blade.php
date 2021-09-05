@extends('..layouts.app')

@section('content')
    <div id="seller-wrapper">
        <div id="seller-sidebar">
            @include('..layouts.ssb')
        </div>
        <div id="seller-main-content">
            <h1>show sản phẩm</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Giá</th>
                    <th colspan="2">Thao tác</th>
                </tr>
<<<<<<< HEAD
                </thead>
                <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>
                            <img src="{{ asset('uploads/product/' .$item->image_product )}}" width="150px" height="110px" alt="Image">
                        </td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->type }}</td>
                        <td>{{ $item->price }}</td>
                        <td>

                            <a href= "{{ route('seller.updateProduct')}}">Sửa</a>
                        </td>
                        <td>
                            <a href = "{{ route('seller.deleteProduct', ['id' => $item->id])}}" >Xóa</a>
                        </td>
                    </tr>
=======
                @foreach ($product as $item) 
                <tr>
                    <td>
                        <img src="{{ asset('uploads/product/' .$item->image_product )}}" width="180px" height="140px" alt="Image">
                    </td>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('seller.editProduct', ['id' => $item->id]) }}">Sửa</a>
                    </td>
                    <td>
                        <a href="">Xóa</a>
                    </td>
                </tr>
>>>>>>> 33ab5bb56f03fd69e4c2deb849bf8e944f66eae8
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

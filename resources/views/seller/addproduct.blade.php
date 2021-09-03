@extends('..layouts.app')

@section('content')
<div id="seller-wrapper">
    <div id="seller-sidebar">
        @include('..layouts.ssb')
    </div>
    <div id="seller-main-content">
        <!-- <form action="{{ route('seller.storeProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h1>Thêm Sản Phẩm</h1>
                <div>
                    <label for="title">Tên sản phẩm</label>
                    <input type="text" name="title" />
                </div>
                <div>
                    <label for="type">Loại sản phẩm</label>
                    <select name="type" id="">
                        <option value="rice">Cơm</option>
                        <option value="congee">Cháo</option>
                        <option value="noodles">Phở</option>
                        <option value="snack">Đồ ăn vặt</option>
                        <option value="drink">Đồ ăn khác</option>
                        <option value="drink">Đồ uống</option>
                    </select>
                </div>
                <div>
                    <label for="price">Giá</label>
                    <input type="text" name="price" />
                    <span>&#8363;</span>
                </div>
                <div>
                    <label for="image">Thêm hình ảnh</label>
                    <input type="file" name="image_product" />
                </div>
                <div>
                    <button type="submit">Thêm sản phẩm</button>
                </div>

            </form> -->
        <form class="container" action="{{ route('seller.storeProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="title">
            </div>
            @error('title')
                <p style="color: red">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <label class="form-check-label" for="exampleCheck1" for="type">Loại sản phẩm</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="type">
                    <option value="rice">Cơm</option>
                    <option value="congee">Cháo</option>
                    <option value="noodles">Phở</option>
                    <option value="snack">Đồ ăn vặt</option>
                    <option value="drink">Đồ ăn khác</option>
                    <option value="drink">Đồ uống</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Giá</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="price">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Giá</label>
                <input type="hidden" class="form-control" id="exampleInputPassword1" name="price1">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="exampleInputPassword1" name="image_product">
            </div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @elseif(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

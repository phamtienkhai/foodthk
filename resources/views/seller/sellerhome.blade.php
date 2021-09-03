@extends('..layouts.app')

@section('content')
    <div id="seller-wrapper">
        <div id="seller-sidebar">
            @include('..layouts.ssb')
        </div>
        <div id="seller-main-content">
            <h1>đây là nội dung chính</h1>
        </div>
    </div>
@endsection

<!DOCTYPE html>
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
<html dir="{{ ( Session::get("locale")== "ar" ? 'rtl' : 'ltr') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    @include('admin.includes.head')
</head>
<body>
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<div id="main-wrapper">
    @include('admin.includes.header')
    @include('admin.includes.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">@yield('title')</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="@yield('url')">@yield('title_side')</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    @yield('title')
                                </li>
                            </ol>
                        </nav>
                    </div>
{{--                    @if(session()->has('message'))--}}
{{--                        <h3 class="alert alert-link text-danger text-lg mb-3">* {{session()->get('message')}}</h3>--}}
{{--                    @endif--}}
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @yield("content")
        </div>
        <footer class="footer text-center">
            All Rights Reserved by AdminBite admin.
        </footer>
    </div>
</div>
@include('admin.includes.footer-script')
</body>
</html>

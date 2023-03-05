<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    @include('website.includes.css')
</head>
<body>
<div>
    @include('website.includes.header')
    @yield('content')
    @include('website.includes.footer')
</div>
@include('website.includes.js')
</body>
</html>

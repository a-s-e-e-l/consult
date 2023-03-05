@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.lalalalallalallalallalalallal') }}
@endsection
@section('title_side')
    {{ __('dashboard.Dashboard') }}
@endsection
@section('url')
    @if(Auth::guard('member')->check())
        {{ url('member/dashboard') }}
    @else
        {{ url('/dashboard') }}
    @endif
@endsection
@section('content')

@endsection

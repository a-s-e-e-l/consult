@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.create') }} {{ __('dashboard.content') }}
@endsection
@section('title_side')
    {{ __('dashboard.contents') }}
@endsection
@section('url')
    {{ url('contents') }}"
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-body p-3 border-radius-lg ">
                @if(session()->has('status'))
                    @if(session()->get('status') == true)
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('dashboard.added')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('content.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.key') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="key">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.value') }}</label>
                        <input type="file" class="form-control orm-control"
                               name="image" id="image"><br>
                        <input type="text" class="form-control orm-control"
                               name="value">
                    </div>
                    <div class="text-center">
                        @foreach ($errors->all() as $message)
                            <span class="alert alert-link text-danger text-sm">* {{ $message }}</span>
                        @endforeach
                        <div class="text-center">
                            <button type="submit" onclick="return confirm('Are You Sure To Create ??')"
                                    class="btn w-100 my-4 mb-2">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


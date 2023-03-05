@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.service') }}
@endsection
@section('title_side')
    {{ __('dashboard.services') }}
@endsection
@section('url')
    {{ url('services') }}"
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="card mt-4">
            <div class="card-body p-3 border-radius-lg ">
                @if(session()->has('status'))
                    @if(session()->get('status') == true)
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('dashboard.edited')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('service.update',$service->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name" value="{{ $service->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.description') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="description">{{ $service->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.icon') }}</label>
                        <img width="70" src="{{$service->icon}}" class="avatar avatar-sm me-2">
                        <input type="file" class="form-control orm-control"
                               name="icon" id="image">
                    </div>
                    <div class="text-center">
                        @foreach ($errors->all() as $message)
                            <span class="alert alert-link text-danger text-sm">* {{ $message }}</span>
                        @endforeach
                        <div class="text-center">
                            <button type="submit" onclick="return confirm('Are You Sure To Edit ??')"
                                    class="btn w-100 my-4 mb-2">{{ __('dashboard.edit') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


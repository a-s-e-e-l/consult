@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.request') }}
@endsection
@section('title_side')
    {{ __('dashboard.requests') }}
@endsection
@section('url')
    {{ url('req') }}"
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
                <form role="form" class="text-start" method="POST" action="{{ route('req.update',$req->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name" value="{{ $req->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.email') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="email" value="{{ $req->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.service') }} {{ __('dashboard.name') }}</label>
                        <select name="service_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Service...</option>
                            @foreach ($services as $service)
                                <option @if($req->service_id==$service->id) selected
                                        @endif value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
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


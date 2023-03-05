@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.member') }}
@endsection
@section('title_side')
    {{ __('dashboard.members') }}
@endsection
@section('url')
    {{ url('members') }}"
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
                <form role="form" class="text-start" method="POST" action="{{ route('member.update',$member->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.name') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="name" value="{{ $member->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.email') }}</label>
                        <input type="email" class="form-control"
                               name="email" value="{{ $member->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.password') }}</label>
                        <input type="password" class="form-control"
                               name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.designation') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="designation" value="{{ $member->designation }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.image') }}</label>
                        <img width="70" src="{{$member->image}}" class="avatar avatar-sm me-2">
                        <input type="file" class="form-control orm-control"
                               name="image" id="image">
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


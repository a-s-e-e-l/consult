@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.content') }}
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
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('dashboard.edited')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('content.update',$content->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.key') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="key" value="{{ $content->key }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.value') }}</label>
                        @if (str_contains($content->key, 't'))
                            <input type="text" class="form-control orm-control"
                                   name="value" value="{{ $content->value }}">
                        @elseif (str_contains($content->key, 'p'))
                            <img width="70" src="{{$content->value}}" class="avatar avatar-sm me-2">
                            <input type="file" class="form-control orm-control"
                                   name="image" id="image"><br>
                        @endif


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


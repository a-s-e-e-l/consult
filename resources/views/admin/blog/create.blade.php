@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.create') }} {{ __('dashboard.blog') }}
@endsection
@section('title_side')
    {{ __('dashboard.blogs') }}
@endsection
@section('url')
    @if(Auth::guard('member')->check()){{ url('member/blogs') }}@else
    {{ url('blogs') }}@endif
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
                <form role="form" class="text-start" method="POST"
                      action="@if(Auth::guard('member')->check()){{ url('member/blog/store') }}@else{{ route('blog.store') }}@endif"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.admin') }} {{ __('dashboard.name') }}</label>
                        @if(Auth::guard('member')->check())
                            <select name="user_id" class="form-control orm-control"
                                    id="inputGroupSelect02" disabled>
                                <option value="{{Auth::guard('member')->user()->id}}"
                                        selected>{{Auth::guard('member')->user()->name}}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>

                        @elseif(Auth::guard('web')->check())
                            <select name="user_id" class="form-control orm-control"
                                    id="inputGroupSelect02">
                                <option selected>Choose Admin...</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.category') }} {{ __('dashboard.name') }}</label>
                        <select name="category_id" class="form-control orm-control"
                                id="inputGroupSelect03">
                            <option selected>Choose Category...</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Title') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.content') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="content"> </textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.image') }}</label>
                        <input type="file" class="form-control orm-control"
                               name="image" id="image">
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


@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.blog') }}
@endsection
@section('title_side')
    {{ __('dashboard.blogs') }}
@endsection
@section('url')
    {{ url('blogs') }}"
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
                <form role="form" class="text-start" method="POST" action="{{ route('blog.update',$blog->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.admin') }} {{ __('dashboard.name') }}</label>
                        <select name="user_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Admin...</option>
                            @foreach ($users as $user)
                                <option @if($blog->user_id==$user->id) selected
                                        @endif value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('Title') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="title" value="{{ $blog->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.content') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="content"> {{ $blog->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.blog') }} {{ __('dashboard.status') }}</label>
                        <select name="status" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option @if($blog->status==0) selected
                                    @endif value="0">Not approved</option>
                            <option @if($blog->status==1) selected
                                    @endif value="1">Approved</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.image') }}</label>
                        <img width="70" src="{{$blog->image}}" class="avatar avatar-sm me-2">
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


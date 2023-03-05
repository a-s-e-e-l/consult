@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.create') }} {{ __('dashboard.comment') }}
@endsection
@section('title_side')
    {{ __('dashboard.comments') }}
@endsection
@section('url')
    {{ url('comments') }}"
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
                <form role="form" class="text-start" method="POST" action="{{ route('comment.store') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.admin') }} {{ __('dashboard.name') }}</label>
                        <select name="user_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Admin...</option>
                            @foreach ($members as $member)
                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.content') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.blog') }} {{ __('Title') }}</label>
                        <select name="blog_id" class="form-control orm-control">
                            <option value="" selected>Choose Blog...</option>
                            @foreach ($blogs as $blog)
                                <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.comment') }} {{ __('content') }}</label>
                        <select name="comment_id" class="form-control orm-control">
                            <option value="" selected>Choose comment...</option>
                            @foreach ($comments as $comment)
                                @if(!empty($comment->blog_id))
                                    <option value="{{ $comment->id }}">{{ $comment->content }}</option>
                                @endif
                            @endforeach
                        </select>
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


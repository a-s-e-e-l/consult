@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.comment') }}
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
                        <span class="alert alert-link text-success text-sm mb-3">* {{__('dashboard.edited')}}</span>
                    @endif
                @endif
                <form role="form" class="text-start" method="POST" action="{{ route('comment.update',$comment->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.admin') }} {{ __('dashboard.name') }}</label>
                        <select name="user_id" class="form-control orm-control"
                                id="inputGroupSelect02">
                            <option selected>Choose Admin...</option>
                            @foreach ($members as $member)
                                <option @if($comment->user_id==$member->id) selected
                                        @endif value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.content') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="content">{{ $comment->content }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.blog') }} {{ __('Title') }}</label>
                        <select name="blog_id" class="form-control orm-control">
                            <option value="" selected>Choose Blog...</option>
                            @foreach ($blogs as $blog)
                                <option @if($comment->blog_id==$blog->id) selected
                                        @endif value="{{ $blog->id }}">{{ $blog->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.comment') }} {{ __('content') }}</label>
                        <select name="comment_id" class="form-control orm-control">
                            <option value="" selected>Choose comment...</option>
                            @foreach ($comments as $comment)
                                @if(!empty($comment->blog_id))
                                    <option @if($comment->comment_id==$comment->id) selected
                                            @endif value="{{ $comment->id }}">{{ $comment->content }}</option>
                                @endif
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


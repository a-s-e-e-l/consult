@extends('admin.layouts.master')
@section('title')
    {{ __('dashboard.Dashboard') }}
@endsection
@section('title')
    {{--    {{ __('dashboard.Dashboard') }}--}}
@endsection
@section('title_side')
    {{--    {{ __('dashboard.Dashboard') }}--}}
@endsection
@section('url')
    {{--    {{ url('/dashboard') }}--}}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card  bg-light no-card-border">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h3 class="m-b-0">Welcome back!   {{ $user->name }}</h3>
{{--                            <h4 class="m-b-0">{{ $user->name }}</h4>--}}
                            <span>{{ $todayDate }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-danger">
                                <i class="fas fa-file-alt text-white"></i>
                            </span>
                        </div>
                        <div>Number Of Blog</div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$totalBlogs}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg btn-info">
                                <i class="fas fa-users text-white"></i>
                            </span>
                        </div>
                        <div>Total Users</div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$totalUser}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-success">
                                <i class="fas fa-th text-white"></i>
                            </span>
                        </div>
                        <div>Total Categories
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$totalCategories}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-warning">
                                <i class="fas fa-comments text-white"></i>
                            </span>
                        </div>
                        <div>Total Comments
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$totalComments}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Comments</h4>
                    </div>
                    <div class="comment-widgets scrollable" style="height:560px;">
                        @if(!count($comments)<1)
                            @foreach($comments as $comment)
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{$comment->member->image}}" alt="user" width="45"
                                     class="rounded-circle" style="width: 45px; height: 45px;">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">{{ $comment->Member->name }}</h6>
                                <span class="m-b-15 d-block">{{ $comment->content }}</span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">{{date_format($comment->created_at,"F")}} {{date_format($comment->created_at,"j")}}{{date_format($comment->created_at," Y")}}</span>
                                    <span class="label label-rounded label-primary">{{$comment->blog_id==null?"reply":"comment"}}</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


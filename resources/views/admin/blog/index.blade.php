@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.blogs') }}
@endsection
@section('title_side')
    {{ __('dashboard.Dashboard') }}
@endsection
@section('url')
    @if(Auth::guard('member')->check())
        {{ url('member/dashboard') }}
    @else
        {{ url('/dashboard') }}
    @endif
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                        </div>
                        <div class="ml-auto">
                            <div class="dl">
                                <a class="btn btn-secondary"
                                   href="{{url('blog/create')}}">{{ __('dashboard.add') }} {{ __('dashboard.blog') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-responsive">
                    <table id="datatable" class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">#Id</th>
                            <th class="border-top-0">{{ __('dashboard.image') }}</th>
                            <th class="border-top-0">{{ __('dashboard.admin') }} {{ __('dashboard.name') }}</th>
                            <th class="border-top-0">{{ __('dashboard.category') }} {{ __('dashboard.name') }}</th>
                            <th class="border-top-0">{{ __('Title') }}</th>
                            <th class="border-top-0">{{ __('dashboard.content') }}</th>
                            @if(Auth::user()->role == 1)
                                <th class="border-top-0">{{ __('dashboard.status') }}</th>
                            @endif
                            <th class="border-top-0">{{ __('dashboard.edit') }}/{{ __('dashboard.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($blogs)<1)
                            @foreach ($blogs as $blog )
                                <tr>
                                    <th scope="row">
                                        <a href="{{url('blog/show/',$blog->id)}}">{{ $blog->id }}</a>
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <img width="70" src="{{$blog->image}}" class="avatar avatar-sm me-2">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $blog->user->name }}</td>
                                    <td>{{ $blog->category_id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    @if(Auth::user()->role == 1)
                                        <td>@if($blog->status==0)
                                                <form action="{{ URL('blog/acceptance/'.$blog->id) }}" method="POST">
                                                    @csrf
                                                    <span class="text-danger font-weight-bold">Not Approved</span>
                                                    <button type="submit"
                                                            onclick="return confirm('Are You Sure To Acceptance ??')"
                                                            class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-success px-3 mb-0">
                                                        <i class='far fa-thumbs-up' style='font-size:20px'></i>
                                                        Approve
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ URL('blog/notAcceptance/'.$blog->id) }}" method="POST">
                                                    @csrf
                                                    <span class="text-success font-weight-bold">Approved</span>
                                                    <button type="submit"
                                                            onclick="return confirm('Are You Sure To Not Acceptance ??')"
                                                            class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-danger px-3 mb-0">
                                                        <i class='far fa-thumbs-down' style='font-size:20px'></i>
                                                        Not Approve
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    @endif
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                           href="{{url('blog/edit',$blog->id)}}">
                                            <i class='fas fa-edit' style='font-size:20px'></i>Edit
                                        </a>
                                        @if ($blog->deleted_at)
                                            <form action="{{ URL('blog/restore/'.$blog->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Restore ??')"
                                                        class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-success px-3 mb-0">
                                                    <i class='fas fa-undo-alt' style='font-size:20px'></i>
                                                    Restore
                                                </button>
                                            </form>
                                        @else
                                            @if(Auth::user()->role == 1)
                                                <form action="{{ URL('blog/destroy/'.$blog->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                            onclick="return confirm('Are You Sure To Delete ??')"
                                                            class="btn btn-link text-danger px-3 mb-0">
                                                        <i class='fas fa-trash-alt' style='font-size:20px'></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="9"
                                    class="text-center">{{ __('dashboard.no') }}{{ __('dashboard.blogs') }}</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="pl-lg-4">
                        {{ $blogs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


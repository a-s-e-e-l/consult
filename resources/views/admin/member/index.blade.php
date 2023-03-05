@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.members') }}
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
                                   href="{{route('member.create')}}">{{ __('dashboard.add') }} {{ __('dashboard.member') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-responsive">
                    <table class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">#Id</th>
                            <th class="border-top-0">{{ __('dashboard.image') }}</th>
                            <th class="border-top-0">{{ __('dashboard.member') }} {{ __('dashboard.name') }}</th>
                            <th class="border-top-0">{{ __('dashboard.email') }}</th>
                            <th class="border-top-0">{{ __('dashboard.designation') }}</th>
                            <th class="border-top-0">{{ __('dashboard.edit') }}/{{ __('dashboard.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($members)<1)
                            @foreach ($members as $member )
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('member.show',$member->id)}}">{{ $member->id }}</a>
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10">
                                                <img width="70" src="{{$member->image}}" class="avatar avatar-sm me-2">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->designation }}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                           href="{{route('member.edit',$member->id)}}">
                                            <i class='fas fa-edit' style='font-size:20px'></i>Edit
                                        </a>
                                        @if ($member->deleted_at)
                                            <form action="{{ URL('member/restore/'.$member->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Restore ??')"
                                                        class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-success px-3 mb-0">
                                                    <i class='fas fa-undo-alt' style='font-size:20px'></i>
                                                    Restore
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ URL('member/destroy/'.$member->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Delete ??')"
                                                        class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-danger px-3 mb-0">
                                                    <i class='fas fa-trash-alt' style='font-size:20px'></i>
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <th colspan="9"
                                    class="text-center">{{ __('dashboard.no') }}{{ __('dashboard.members') }}</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="pl-lg-4">
                        {{ $members->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

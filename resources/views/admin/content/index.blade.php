@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.contents') }}
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
                                   href="{{route('content.create')}}">{{ __('dashboard.add') }} {{ __('dashboard.content') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-responsive">
                    <table id="datatable" class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">#Id</th>
                            <th class="border-top-0">{{ __('dashboard.key') }}</th>
                            <th class="border-top-0">{{ __('dashboard.value') }}</th>
                            <th class="border-top-0">{{ __('dashboard.edit') }}/{{ __('dashboard.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($contents)<1)
                            @foreach ($contents as $content )
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('content.show',$content->id)}}">{{ $content->id }}</a>
                                    </th>
                                    <td>{{ $content->key }}</td>
                                    @if (str_contains($content->key, 't'))
                                        <td>{{ $content->value }}</td>
                                    @elseif (str_contains($content->key, 'p'))
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="m-r-10">
                                                    <img width="70" src="{{$content->value}}"
                                                         class="avatar avatar-sm me-2">
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                           href="{{route('content.edit',$content->id)}}">
                                            <i class='fas fa-edit' style='font-size:20px'></i>Edit
                                        </a>
                                        @if ($content->deleted_at)
                                            <form action="{{ URL('content/restore/'.$content->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Restore ??')"
                                                        class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-success px-3 mb-0">
                                                    <i class='fas fa-undo-alt' style='font-size:20px'></i>
                                                    Restore
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ URL('content/destroy/'.$content->id) }}" method="POST">
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
                                    class="text-center">{{ __('dashboard.no') }}{{ __('dashboard.contents') }}</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="pl-lg-4">
                        {{ $contents->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


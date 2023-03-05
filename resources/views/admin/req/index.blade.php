@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.requests') }}
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
                                   href="{{route('req.create')}}">{{ __('dashboard.add') }} {{ __('dashboard.request') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-responsive">
                    <table id="datatable" class="table v-middle">
                        <thead>
                        <tr class="bg-light">
                            <th class="border-top-0">#Id</th>
                            <th class="border-top-0">{{ __('dashboard.service') }} {{ __('dashboard.name') }}</th>
                            <th class="border-top-0">{{ __('dashboard.name') }}</th>
                            <th class="border-top-0">{{ __('dashboard.email') }}</th>
                            <th class="border-top-0">{{ __('dashboard.edit') }}/{{ __('dashboard.delete') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!count($req)<1)
                            @foreach ($req as $r )
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('req.show',$r->id)}}">{{ $r->id }}</a>
                                    </th>
                                    <td>{{ $r->service->name }}</td>
                                    <td>{{ $r->name }}</td>
                                    <td>{{ $r->email }}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-link text-dark px-3 mb-0"
                                           href="{{route('req.edit',$r->id)}}">
                                            <i class='fas fa-edit' style='font-size:20px'></i>Edit
                                        </a>
                                        @if ($r->deleted_at)
                                            <form action="{{ URL('req/restore/'.$r->id) }}" method="POST">
                                                @csrf
                                                <button type="submit"
                                                        onclick="return confirm('Are You Sure To Restore ??')"
                                                        class="@if(Auth::user()->role != 1)disabled @endif btn btn-link text-success px-3 mb-0">
                                                    <i class='fas fa-undo-alt' style='font-size:20px'></i>
                                                    Restore
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ URL('req/destroy/'.$r->id) }}" method="POST">
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
                                    class="text-center">{{ __('dashboard.no') }}{{ __('dashboard.requests') }}</th>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="pl-lg-4">
                        {{ $req->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


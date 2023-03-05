@extends('admin.layouts.master')
@php
    App::setLocale(Session::get("locale") != null ? Session::get("locale") : "en");
@endphp
@section('title')
    {{ __('dashboard.edit') }} {{ __('dashboard.category') }}
@endsection
@section('title_side')
    {{ __('dashboard.categories') }}
@endsection
@section('url')
    {{ url('categories') }}"
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
                <form role="form" class="text-start" method="POST" action="{{ route('category.update',$category->id) }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">{{ __('Title') }}</label>
                        <input type="text" class="form-control orm-control"
                               name="title" value="{{ $category->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">{{ __('dashboard.description') }}</label>
                        <textarea rows="5" class="form-control orm-control"
                                  name="description">{{ $category->description }} </textarea>
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


@extends('website.layouts.master')
@section('content')
<!-- Page Header Start -->
<div class="container-fluid bg-dark p-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-white">Blog Grid</h1>
            <a href="">Home</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="">Blog Grid</a>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Blog Start -->
<div class="container-fluid py-6 px-5">
    <div class="row g-5">
        <!-- Blog list Start -->
        <div class="col-lg-8">
            <div class="row g-5">
                @if(!count($blogs)<1)
                    @foreach ($blogs as $blog )
                <div class="col-12">
                    <div class="blog-item">
                        <div class="position-relative overflow-hidden">
                            <img style="height: 450px" class="img-fluid w-100" src="{{$blog->image}}" alt="">
                        </div>
                        <div class="bg-secondary d-flex">
                            <div class="flex-shrink-0 d-flex flex-column justify-content-center text-center bg-primary text-white px-4">
                                <span>{{date_format($blog->created_at,"d")}}</span>
                                <h5 class="text-uppercase m-0">{{ date("M", mktime(date_format($blog->created_at,"m")))}}</h5>
                                <span>{{date_format($blog->created_at,"Y")}}</span>
                            </div>
                            <div class="d-flex flex-column justify-content-center py-3 px-4">
                                <div class="d-flex mb-2">
                                    <small class="text-uppercase me-3"><i class="bi bi-person me-2"></i>{{$blog->user->name}}</small>
                                    <small class="text-uppercase me-3"><i class="bi bi-bookmarks me-2"></i>{{$blog->category->title}}</small>
                                </div>
                                <a class="h4" href="{{url('blog/detail',$blog->id)}}">{{$blog->title}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                @endif
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg m-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="bi bi-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="bi bi-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Blog list End -->

        <!-- Sidebar Start -->
        <div class="col-lg-4">
            <!-- Search Form Start -->
            <div class="mb-5">
                <div class="input-group">
                    <input type="text" class="form-control p-3" placeholder="Keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
            <!-- Search Form End -->

            <!-- Category Start -->
            @if(!count($categories)<1)
            <div class="mb-5">
                <h2 class="mb-4">Categories</h2>
                <div class="d-flex flex-column justify-content-start bg-secondary p-4">
                    @foreach ($categories as $category )
                    <a class="h5 mb-3" href="{{Url('blog/grid',$category->id)}}"><i class="bi bi-arrow-right text-primary me-2"></i>{{ $category->title}}</a>
                    @endforeach
                </div>
            </div>
            @endif
            <!-- Category End -->

            <!-- Recent Post Start -->
            <div class="mb-5">
                <h2 class="mb-4">Recent Post</h2>
                @if(!count($blogsOrder)<1)
                    @foreach ($blogsOrder as $blog )
                <div class="d-flex mb-3 justify-content-start bg-secondary">
                    <img class="img-fluid" src="{{$blog->image}}" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="{{url('blog/detail',$blog->id)}}" class="h5 d-flex align-items-center bg-secondary px-3 mb-0">{{$blog->title}}
                    </a>
                </div>
                    @endforeach
                @endif
            </div>
            <!-- Recent Post End -->

            <!-- Image Start -->
            <div class="mb-5">
                <img src="{{asset('website/assets/img/blog-1.jpg')}}" alt="" class="img-fluid">
            </div>
            <!-- Image End -->

            <!-- Tags Start -->
            <div class="mb-5">
                <h2 class="mb-4">Tag Cloud</h2>
                <div class="d-flex flex-wrap m-n1">
                    <a href="" class="btn btn-secondary m-1">Design</a>
                    <a href="" class="btn btn-secondary m-1">Development</a>
                    <a href="" class="btn btn-secondary m-1">Marketing</a>
                    <a href="" class="btn btn-secondary m-1">SEO</a>
                    <a href="" class="btn btn-secondary m-1">Writing</a>
                    <a href="" class="btn btn-secondary m-1">Consulting</a>
                    <a href="" class="btn btn-secondary m-1">Design</a>
                    <a href="" class="btn btn-secondary m-1">Development</a>
                    <a href="" class="btn btn-secondary m-1">Marketing</a>
                    <a href="" class="btn btn-secondary m-1">SEO</a>
                    <a href="" class="btn btn-secondary m-1">Writing</a>
                    <a href="" class="btn btn-secondary m-1">Consulting</a>
                </div>
            </div>
            <!-- Tags End -->

            <!-- Plain Text Start -->
            <div>
                <h2 class="mb-4">Plain Text</h2>
                <div class="bg-secondary text-center" style="padding: 30px;">
                    <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet diam</p>
                    <a href="" class="btn btn-primary rounded-pill py-2 px-4">Read More</a>
                </div>
            </div>
            <!-- Plain Text End -->
        </div>
        <!-- Sidebar End -->
    </div>
</div>
<!-- Blog End -->
@endsection

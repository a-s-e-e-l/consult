@extends('website.layouts.master')
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark p-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-white">Blog Detail</h1>
                <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">Blog Detail</a>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <img style="height: 450px" class="img-fluid w-100 mb-5" src="{{$blog->image}}" alt="">
                    <h1 class="mb-4">{{$blog->title}}</h1>
                    <p>{{$blog->content}}</p>
                </div>
                <!-- Blog Detail End -->

                <!-- Comment List Start -->
                <div class="mb-5">
                    @if(!count($comments)<1)
                        @foreach ($comments as $comment )
                            @if(!empty($comment->blog_id))
                                @if($comment['parentBlog']->id==$blog->id)
                                    <h2 class="mb-4">{{\App\Models\admin\Comment::where('blog_id',$blog->id)->count('id')}}
                                        Comments</h2>
                                    <div class="d-flex mb-4">
                                        <img src="{{$comment->member->image}}" class="img-fluid rounded-circle"
                                             style="width: 45px; height: 45px;">
                                        <div class="ps-3">
                                            <h6><a href="">{{$comment->member->name}}</a>
                                                <small><i>{{date_format($comment->created_at,"d ")}}{{ date("M", mktime(date_format($comment->created_at,"m")))}}{{date_format($comment->created_at," Y")}}</i></small>
                                            </h6>
                                            <p>{{$comment->content}}</p>
                                            <button class="btn btn-sm btn-light">Reply</button>
                                        </div>
                                    </div>
                                    @foreach ($comments as $com )
                                        @if(!empty($com->comment_id))
                                            @if($com['parentComment']->id==$comment->id)
                                                <div class="d-flex ms-5 mb-4">
                                                    <img src="{{$com->member->image}}" class="img-fluid rounded-circle"
                                                         style="width: 45px; height: 45px;">
                                                    <div class="ps-3">
                                                        <h6><a href="">{{$com->member->name}}</a>
                                                            <small><i>{{date_format($com->created_at,"d ")}}{{ date("M", mktime(date_format($com->created_at,"m")))}}{{date_format($com->created_at," Y")}}</i></small>
                                                        </h6>
                                                        <p>{{$com->content}}</p>
                                                        {{--                                                        <button class="btn btn-sm btn-light">Reply</button>--}}
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    @endif
                </div>
                <!-- Comment List End -->

                <!-- Comment Form Start -->
                <div class="bg-secondary p-5">
                    <h2 class="mb-4">Leave a comment</h2>
                    <form>
                        <div class="row g-3">
                            <div class="col-12 col-sm-6">
                                <input type="text" class="form-control bg-white border-0" placeholder="Your Name"
                                       style="height: 55px;">
                            </div>
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-white border-0" placeholder="Your Email"
                                       style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control bg-white border-0" placeholder="Website"
                                       style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control bg-white border-0" rows="5"
                                          placeholder="Comment"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Leave Your Comment</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Comment Form End -->
            </div>

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
                        <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita
                            kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet
                            diam</p>
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

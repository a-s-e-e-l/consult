@extends('website.layouts.master')
@section('title')
    {{__('dashboard.home')}}
@endsection
@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    @foreach ($contents as $content )
                        @if (str_contains($content->key, 'p1'))
                            <img class="w-100" src="{{$content->value}}" alt="Image">
                        @endif
                    @endforeach
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">Business Consultancy</h5>
                            @foreach ($contents as $content )

                                @if (str_contains($content->key, 'carousel_1'))
                                    <h1 class="display-1 text-white mb-md-4">{{$content->value}}</h1>
                                @endif
                                @if (str_contains($content->key, 'b_1'))
                                    <a href=""
                                       class="btn btn-primary py-md-3 px-md-5 me-3 rounded-pill">{{$content->value}}</a>
                                @endif
                                @if (str_contains($content->key, 'b_2'))
                                    <a href=""
                                       class="btn btn-secondary py-md-3 px-md-5 rounded-pill">{{$content->value}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    @foreach ($contents as $content )

                        @if (str_contains($content->key, 'p2'))
                            <img class="w-100" src="{{$content->value}}" alt="Image">
                        @endif
                    @endforeach
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase">Business Consultancy</h5>
                            @foreach ($contents as $content )

                                @if (str_contains($content->key, 'carousel_2'))
                                    <h1 class="display-1 text-white mb-md-4">{{$content->value}}</h1>
                                @endif
                                @if (str_contains($content->key, 'b_1'))
                                    <a href=""
                                       class="btn btn-primary py-md-3 px-md-5 me-3 rounded-pill">{{$content->value}}</a>
                                @endif
                                @if (str_contains($content->key, 'b_2'))
                                    <a href=""
                                       class="btn btn-secondary py-md-3 px-md-5 rounded-pill">{{$content->value}}</a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid bg-secondary p-0">
        <div class="row g-0">
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">Welcome To <span class="text-primary">CONSULT</span></h1>
                <h4 class="text-primary mb-4">Diam dolor diam ipsum sit. Clita erat ipsum et lorem stet no lorem sit
                    clita duo justo magna dolore</h4>
                <p class="mb-4">Et stet ipsum nonumy rebum eos justo, accusam invidunt aliquyam stet magna at et
                    sanctus, vero sea sit amet dolores, sit dolor duo invidunt dolor, kasd rebum consetetur diam
                    invidunt erat stet. Accusam nonumy lorem kasd eirmod. Justo clita sadipscing ea invidunt rebum
                    sadipscing consetetur. Amet diam amet amet sanctus sanctus invidunt erat ipsum eirmod.</p>
                <a href="" class="btn btn-primary py-md-3 px-md-5 rounded-pill">Get A Quote</a>
            </div>
            <div class="col-lg-6">
                <div class="h-100 d-flex flex-column justify-content-center bg-primary p-5">
                    @if(!count($services)<1)
                        @foreach ($services as $service )
                            <div class="d-flex text-white mb-5">
                                <div
                                    class="d-flex flex-shrink-0 align-items-center justify-content-center text-primary rounded-circle mx-auto mb-4"
                                    style="width: 60px; height: 60px;">
                                    <img width="30" class="img-fluid " src="{{$service->icon}}">
                                </div>
                                <div class="ps-4">
                                    <h3>{{$service->name}}</h3>
                                    <p class="mb-0">{{$service->description}}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid pt-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">What We Offer</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            @if(!count($services)<1)
                @foreach ($services as $service )
                    <div class="col-lg-4 col-md-6">
                        <div class="service-item bg-secondary text-center px-5">
                            <div
                                class="d-flex align-items-center justify-content-center bg-primary text-white rounded-circle mx-auto mb-4"
                                style="width: 90px; height: 90px;">
                                <img width="40" class="img-fluid " src="{{$service->icon}}">
                            </div>
                            <h3 class="mb-3">{{$service->name}}</h3>
                            <p class="mb-0">{{$service->description}}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Services End -->

    <!-- Features Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">Why Choose Us!!!</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-cubes fs-4 text-white"></i>
                        </div>
                        <h3>Best In Industry</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-percent fs-4 text-white"></i>
                        </div>
                        <h3>99% Success Rate</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-award fs-4 text-white"></i>
                        </div>
                        <h3>Award Winning</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-block bg-primary h-100 text-center">
                    <img class="img-fluid" src="{{asset('website/assets/img/feature.jpg')}}" alt="">
                    <div class="p-4">
                        <p class="text-white mb-4">Clita nonumy sanctus nonumy et clita tempor, et sea amet ut et
                            sadipscing rebum amet takimata amet, sed accusam eos eos dolores dolore et. Et ea ea
                            dolor
                            rebum invidunt clita eos. Sea accusam stet stet ipsum, sit ipsum et ipsum kasd</p>
                        <a href="" class="btn btn-light py-md-3 px-md-5 rounded-pill mb-2">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="far fa-smile-beam fs-4 text-white"></i>
                        </div>
                        <h3>100% Happy Client</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-user-tie fs-4 text-white"></i>
                        </div>
                        <h3>Professional Advisors</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                    <div class="col-12">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center mb-3"
                             style="width: 60px; height: 60px;">
                            <i class="fa fa-headset fs-4 text-white"></i>
                        </div>
                        <h3>24/7 Customer Support</h3>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet ipsum lorem diam dolor eos diam et diam
                            dolor ea</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Features End -->

    <!-- Quote Start -->
    <div class="container-fluid bg-secondary px-0">
        <div class="row g-0">
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">Request A Free Quote</h1>
                <p class="mb-4">Kasd vero erat ea amet justo no stet, et elitr no dolore no elitr sea kasd et dolor
                    diam
                    tempor. Nonumy sed dolore no eirmod sit nonumy vero lorem amet stet diam at. Ea at lorem sed et,
                    lorem et rebum ut eirmod gubergren, dolor ea duo diam justo dolor diam ipsum dolore stet stet
                    elitr
                    ut. Ipsum amet labore lorem lorem diam magna sea, eos sed dolore elitr.</p>
                <form>
                    <div class="row gx-3">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="form-floating-1" placeholder="John Doe">
                                <label for="form-floating-1">Full Name</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="form-floating-2"
                                       placeholder="name@example.com">
                                <label for="form-floating-2">Email address</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Financial Consultancy">
                                    <option selected>Financial Consultancy</option>
                                    <option value="1">Strategy Consultancy</option>
                                    <option value="2">Tax Consultancy</option>
                                </select>
                                <label for="floatingSelect">Select A Service</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-primary w-100 h-100" type="submit">Request A Quote</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{asset('website/assets/img/quote.jpg')}}"
                         style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->

    <!-- Team Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">Our Team Members</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        <div class="row g-5">
            @if(!count($members)<1)
                @foreach ($members as $member )
                    <div class="col-lg-4">
                        <div class="team-item position-relative overflow-hidden">
                            <img style="height:550px" class="img-fluid w-100" src="{{$member->image}}" alt="">
                            <div class="team-text w-100 position-absolute top-50 text-center bg-primary p-4">
                                <h3 class="text-white">{{$member->name}}</h3>
                                <p class="text-white text-uppercase mb-0">{{$member->designation}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-secondary p-0">
        <div class="row g-0">
            <div class="col-lg-6" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="{{asset('website/assets/img/testimonial.jpg')}}"
                         style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 py-6 px-5">
                <h1 class="display-5 mb-4">What Say Our Client!!!</h1>
                <div class="owl-carousel testimonial-carousel">
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal mb-4"><i class="fa fa-quote-left text-primary me-3"></i>Dolores sed
                            duo
                            clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem
                            magna
                            ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle"
                                 src="{{asset('website/assets/img/testimonial-1.jpg')}}" alt="">
                            <div class="ps-4">
                                <h3>Client Name</h3>
                                <span class="text-uppercase">Profession</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item">
                        <p class="fs-4 fw-normal mb-4"><i class="fa fa-quote-left text-primary me-3"></i>Dolores sed
                            duo
                            clita tempor justo dolor et stet lorem kasd labore dolore lorem ipsum. At lorem lorem
                            magna
                            ut et, nonumy et labore et tempor diam tempor erat dolor rebum sit ipsum.</p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid rounded-circle"
                                 src="{{asset('website/assets/img/testimonial-2.jpg')}}" alt="">
                            <div class="ps-4">
                                <h3>Client Name</h3>
                                <span class="text-uppercase">Profession</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <!-- Blog Start -->
    <div class="container-fluid py-6 px-5">
        <div class="text-center mx-auto mb-5" style="max-width: 600px;">
            <h1 class="display-5 mb-0">Latest Blog Post</h1>
            <hr class="w-25 mx-auto bg-primary">
        </div>
        @if(!count($blogs)<1)
            <div class="row g-5">
                @foreach ($blogs as $blog )
                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="position-relative overflow-hidden">
                                {{--                        <img class="img-fluid" src="{{asset('website/assets/img/blog-1.jpg')}}" alt="">--}}
                                <img class="img-fluid" src="{{$blog->image}}">

                            </div>
                            <div class="bg-secondary d-flex">
                                <div
                                    class="flex-shrink-0 d-flex flex-column justify-content-center text-center bg-primary text-white px-4">
                                    <span>{{date_format($blog->created_at,"d")}}</span>
                                    <h5 class="text-uppercase m-0">{{ date("M", mktime(date_format($blog->created_at,"m")))}}</h5>
                                    <span>{{date_format($blog->created_at,"Y")}}</span>
                                </div>
                                <div class="d-flex flex-column justify-content-center py-3 px-4">
                                    <div class="d-flex mb-2">
                                        <small class="text-uppercase me-3"><i
                                                class="bi bi-person me-2"></i>{{$blog->user->name}}</small>
                                        <small class="text-uppercase me-3"><i class="bi bi-bookmarks me-2"></i>Web
                                            Design</small>
                                    </div>
                                    <a class="h4" href="">{{$blog->title}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <!-- Blog End -->
@endsection

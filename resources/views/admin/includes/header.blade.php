<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="ti-menu ti-close"></i>
            </a>
            <a class="navbar-brand" href="{{url('home')}}">
                <b class="logo-icon"></b>
                <span class="logo-text">
                    <img src="{{asset('admin/assets/images/logo-text.png')}}" alt="homepage" class="dark-logo"/>
                    <img src="{{asset('admin/assets/images/logo-light-text.png')}}" class="light-logo" alt="homepage"/>
                </span>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto">
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                       data-sidebartype="mini-sidebar">
                        <i class="sl-icon-menu font-20"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="ti-bell font-20"></i>

                    </a>
                    <div class="dropdown-menu mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title bg-primary text-white">
                                    <span class="m-b-0 m-t-5">{{count(auth()->user()->unreadNotifications)}} New</span>
                                    <span class="font-light">Notifications</span>
                                </div>
                            </li>
                            @if(count(auth()->user()->Notifications)>0)
                                <li>
                                    <div class="message-center notifications">
                                        @foreach(auth()->user()->Notifications as $notification)
                                            <!-- Message -->
                                            <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                                <div class="mail-contnet">
                                                    <h5 class="message-title">{{$notification->data['user']['name']}}</h5>
                                                    @if($notification->read_at == null)
                                                        <form class="float-right" action="{{ URL('notification/read/'.$notification->id) }}"
                                                              method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="btn btn-link px-3 mb-0">
                                                                <i class=' far fa-envelope'
                                                                   style='font-size:20px'></i>
                                                            </button>
                                                        </form>
                                                    @else
                                                        <i class='float-right far fa-envelope-open'
                                                           style='font-size:20px'></i>
                                                    @endif
                                                    <span class="mail-desc">
                                                        @if($notification->data['notifiable']['status']==1)
                                                            blog {{$notification->data['notifiable']['id']}} is Approved
                                                        @else
                                                            blog {{$notification->data['notifiable']['id']}} is Not
                                                            Approved
                                                        @endif
                                                    </span>
                                                    <span
                                                        class="time">{{date_format($notification->created_at,"h:i A")}}</span>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a class="nav-link text-center m-b-5" href="javascript:void(0);">
                                        <strong>No unread Notification</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                @if(count(config('app.languages')) > 1)
                    <li class="nav-item dropdown d-md-down-none">
                        <a class="nav-link" data-toggle="dropdown" href="" role="button" aria-haspopup="true"
                           aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right  animated bounceInDown"
                             aria-labelledby="navbarDropdown2">
                            <form action="{{URL('lang')}}" method="post">
                                @csrf
                                @foreach(config('app.languages') as $langLocale => $langName)
                                    <button class="dropdown-item new-button" type="submit" value="{{$langLocale}}"
                                            name="lang">{{ strtoupper($langLocale) }} ({{ $langName }})
                                    </button>
                                @endforeach
                            </form>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href=""
                       data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false">
                        <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="user" class="rounded-circle"
                        <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="user" class="rounded-circle"
                             width="31">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <img src="{{asset('admin/assets/images/2.png')}}" alt="user"
                                     class="img-circle"
                                     width="60">
                            </div>
                        </div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-user m-r-5 m-l-5"></i> {{ __('dashboard.My Profile')}} </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-wallet m-r-5 m-l-5"></i> {{ __('dashboard.My Balance')}}</a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-email m-r-5 m-l-5"></i> {{ __('dashboard.Inbox')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="ti-settings m-r-5 m-l-5"></i> {{ __('dashboard.Account Setting')}}</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                           href="@if(Auth::guard('member')->check()){{ route('member.logout') }}@else{{ route('logout') }}@endif">
                            <i class="fa fa-power-off m-r-5 m-l-5"></i> {{ __('dashboard.Log Out')}}</a>
                        <div class="dropdown-divider"></div>
                        <div class="p-l-30 p-10">
                            <a href="javascript:void(0)"
                               class="btn btn-sm btn-success btn-rounded">{{ __('dashboard.View Profile')}}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

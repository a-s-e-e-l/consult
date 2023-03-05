<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{asset('admin/assets/images/logo-icon.png')}}" alt="users"
                                 class="rounded-circle img-fluid"/>
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd"
                               role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="@if(Auth::guard('member')->check()){{ route('member.logout') }}@else{{ route('logout') }}@endif"
                               title="Logout" class="btn btn-circle btn-sm">
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
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
                            </div>
                        </div>
                    </div>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                       aria-expanded="false">
                        <i class="icon-Car-Wheel"></i>
                        <span class="hide-menu">{{ __('dashboard.Dashboards')}}</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @if(Auth::user()->role == 0)
                            <li>
                                <a href="{{url('blog/create')}}" class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.add') }} {{ __('dashboard.blog') }}</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/categories') }}@else{{ url('categories') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.categories')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/blogs') }}@else{{ url('blogs') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.blogs')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/comments') }}@else{{ url('comments') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.comments')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/members') }}@else{{ url('members') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.members')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/services') }}@else{{ url('services') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.services')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/req') }}@else{{ url('req') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.requests')}}</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a href="@if(Auth::user()->role == 0){{ url('member/contents') }}@else{{ url('contents') }}@endif"
                                   class="sidebar-link">
                                    <i class="icon-Record"></i>
                                    <span class="hide-menu">{{ __('dashboard.contents')}}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{ route('logout') }}"
                       aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">{{ __('dashboard.Log Out')}} </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

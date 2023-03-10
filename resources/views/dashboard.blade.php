@extends('admin.layouts.master')
@section('title')
    {{ __('dashboard.Dashboard') }}
@endsection
@section('title')
    {{--    {{ __('dashboard.Dashboard') }}--}}
@endsection
@section('title_side')
    {{--    {{ __('dashboard.Dashboard') }}--}}
@endsection
@section('url')
    {{--    {{ url('/dashboard') }}--}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-danger">
                                <i class="ti-clipboard text-white"></i>
                            </span>
                        </div>
                        <div>
                            New projects
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">23</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg btn-info">
                                <i class="ti-wallet text-white"></i>
                            </span>
                        </div>
                        <div>Total Earnings</div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">113</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-success">
                                <i class="ti-shopping-cart text-white"></i>
                            </span>
                        </div>
                        <div>Total Sales
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">43</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg bg-warning">
                                <i class="mdi mdi-currency-usd text-white"></i>
                            </span>
                        </div>
                        <div>Profit
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">63</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h4 class="card-title">Top Selling Products</h4>
                                <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                            </div>
                            <div class="ml-auto">
                                <div class="dl">
                                    <select class="custom-select">
                                        <option value="0" selected="">Monthly</option>
                                        <option value="1">Daily</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Yearly</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                            <tr class="bg-light">
                                <th class="border-top-0">Products</th>
                                <th class="border-top-0">License</th>
                                <th class="border-top-0">Support Agent</th>
                                <th class="border-top-0">Technology</th>
                                <th class="border-top-0">Tickets</th>
                                <th class="border-top-0">Sales</th>
                                <th class="border-top-0">Earnings</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <a class="btn btn-circle btn-danger text-white">EA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Elite Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-danger">Angular</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <a class="btn btn-circle btn-info text-white">MA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Monster Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>Venessa Fern</td>
                                <td>
                                    <label class="label label-info">Vue Js</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <a class="btn btn-circle btn-success text-white">MP</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Material Pro Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-success">Bootstrap</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="m-r-10">
                                            <a class="btn btn-circle btn-purple text-white">AA</a>
                                        </div>
                                        <div class="">
                                            <h4 class="m-b-0 font-16">Ample Admin</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>Single Use</td>
                                <td>John Doe</td>
                                <td>
                                    <label class="label label-purple">React</label>
                                </td>
                                <td>46</td>
                                <td>356</td>
                                <td>
                                    <h5 class="m-b-0">$2850.06</h5>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Comments</h4>
                    </div>
                    <div class="comment-widgets scrollable" style="height:560px;">
                        <div class="d-flex flex-row comment-row m-t-0">
                            <div class="p-2">
                                <img src="{{asset('admin/assets/images/1.jpg')}}" alt="user" width="50"
                                     class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">James Anderson</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('admin/assets/images/img3.jpg')}}" alt="user" width="50"
                                     class="rounded-circle">
                            </div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Michael Jorden</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-success label-rounded">Approved</span>
                                    <span class="action-icons active">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="icon-close"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart text-danger"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('admin/assets/images/img2.jpg')}}" alt="user" width="50"
                                     class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">Johnathan Doeting</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-danger">Rejected</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('admin/assets/images/img1.jpg')}}" alt="user" width="50"
                                     class="rounded-circle">
                            </div>
                            <div class="comment-text w-100">
                                <h6 class="font-medium">James Anderson</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-rounded label-primary">Pending</span>
                                    <span class="action-icons">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-check"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-row comment-row">
                            <div class="p-2">
                                <img src="{{asset('admin/assets/images/2.png')}}" alt="user" width="50"
                                     class="rounded-circle">
                            </div>
                            <div class="comment-text active w-100">
                                <h6 class="font-medium">Michael Jorden</h6>
                                <span class="m-b-15 d-block">Lorem Ipsum is simply dummy text of the printing and type setting industry. </span>
                                <div class="comment-footer">
                                    <span class="text-muted float-right">April 14, 2016</span>
                                    <span class="label label-success label-rounded">Approved</span>
                                    <span class="action-icons active">
                                        <a href="javascript:void(0)">
                                            <i class="ti-pencil-alt"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="icon-close"></i>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <i class="ti-heart text-danger"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Chats</h4>
                        <div class="chat-box scrollable position-relative" style="height:475px;">
                            <ul class="chat-list">
                                <li class="chat-item">
                                    <div class="chat-img">
                                        <img src="{{asset('admin/assets/images/1.jpg')}}" alt="user">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="font-medium">James Anderson</h6>
                                        <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing
                                            &amp; type setting industry.
                                        </div>
                                    </div>
                                    <div class="chat-time">10:56 am</div>
                                </li>
                                <li class="chat-item">
                                    <div class="chat-img">
                                        <img src="{{asset('admin/assets/images/2.png')}}" alt="user">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="font-medium">Bianca Doe</h6>
                                        <div class="box bg-light-info">It???s Great opportunity to work.</div>
                                    </div>
                                    <div class="chat-time">10:57 am</div>
                                </li>
                                <li class="odd chat-item">
                                    <div class="chat-content">
                                        <div class="box bg-light-inverse">I would love to join the team.</div>
                                        <br>
                                    </div>
                                </li>
                                <li class="odd chat-item">
                                    <div class="chat-content">
                                        <div class="box bg-light-inverse">Whats budget of the new project.</div>
                                        <br>
                                    </div>
                                    <div class="chat-time">10:59 am</div>
                                </li>
                                <li class="chat-item">
                                    <div class="chat-img">
                                        <img src="{{asset('admin/assets/images/3.png')}}" alt="user">
                                    </div>
                                    <div class="chat-content">
                                        <h6 class="font-medium">Angelina Rhodes</h6>
                                        <div class="box bg-light-info">Well we have good budget for the project</div>
                                    </div>
                                    <div class="chat-time">11:00 am</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body border-top">
                        <div class="row">
                            <div class="col-9">
                                <div class="input-field m-t-0 m-b-0">
                                    <input type="text" id="textarea1" placeholder="Type and enter" class="form-control
                                    border-0">
                                </div>
                            </div>
                            <div class="col-3">
                                <a class="btn-circle btn-lg btn-cyan float-right text-white" href="javascript:void(0)">
                                    <i class="fas fa-paper-plane"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


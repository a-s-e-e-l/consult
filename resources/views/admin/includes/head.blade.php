<!-- Favicon icon -->
{{--<link rel="icon" type="image/png" sizes="16x16" href="">--}}
<title>@yield("title")</title>
<!-- Custom CSS -->
<link href="{{asset('admin/assets/libs/chartist.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/extra-libs/c3.min.css')}}" rel="stylesheet">
<link href="{{asset('admin/assets/libs/morris.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="{{asset('admin/icons/css/simple-line-icon.css')}}">
<link href="{{asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
{{--<link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">--}}

{{--<link href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">--}}
<style>@yield("css")</style>
<style>
    .mytable {
        max-width: 170px; /* Customise it accordingly */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .content {
        max-width: 250px; /* Customise it accordingly */
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .left {
        height: 100vh;
        padding-top: 110px;
        padding-right: 10px;
        padding-left: 10px;
        text-align: center;
    }

    .right {
        /*background-color: #E9FBFF;*/
        height: 100vh;
        padding-top: 100px;
        padding-right: 10px;
        padding-left: 10px;
    }
</style>


<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="{{asset('admin/assets/libs/jquery.min.js')}}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{asset('admin/assets/libs/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/libs/bootstrap.min.js')}}"></script>
<!-- apps -->
<script src="{{asset('admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('admin/dist/js/app.init.js')}}"></script>
<script src="{{asset('admin/dist/js/app-style-switcher.js')}}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{{asset('admin/assets/libs/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin/assets/extra-libs/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('admin/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin/dist/js/custom.min.js')}}"></script>
{{--<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>--}}

{{--<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>--}}

{{--<script>--}}
{{--    $(document).ready(function () {--}}
{{--        $('#datatable').DataTable({--}}
{{--            processing: true,--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
@yield("js")
<script>
    var msg = '{{Session::get('message')}}';
    var exist = '{{Session::has('message')}}';
    if(exist){
        alert(msg);
    }
</script>

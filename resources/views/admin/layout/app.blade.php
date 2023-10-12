<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--begin::Global Theme Styles -->
    <link href="{!!asset('public/assets/vendors/base/vendors.bundle.css')!!}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{!!asset('public/assets/demo/default/base/style.bundle.css')!!}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />

   {{--  <link href="public/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
 --}}

    <!--RTL version:<link href="assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles -->
    {{-- <link href="{!!asset('public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')!!}" rel="stylesheet" type="text/css" /> --}}

    <!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors Styles -->
    <link rel="shortcut icon" href="{!!asset('public/assets/demo/default/media/img/logo/favicon.ico')!!}" />

    @if($message = Session::get('success'))
    <script type="text/javascript">
        setTimeout(function() {
            toastr.options = {
                timeOut: 4000,
                // closeButton: true,
                //extendedTimeOut:0,
                // progressBar: true,
                //showMethod: 'slideDown',
            };
            toastr.success('{{$message["msg"]}}');
        }, 1300);
    </script>
    @endif
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        <!-- BEGIN: Header -->
        @include('admin.layout.header')

        <!-- END: Header -->

        <!-- begin::Body -->
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            @include('admin.layout.aside')
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">
                <div class="m-content">
                    @yield('content')
                </div>
            </div>
        </div>

     <!-- end:: Body -->

     <!-- begin::Footer -->
     @include('admin.layout.footer')
     <!-- end::Footer -->
    </div>

 <!-- end:: Page -->

 <!-- begin::Quick Sidebar -->
 @include('admin.layout.quicksidebar')

 <!-- end::Quick Sidebar -->

 <!-- begin::Scroll Top -->
 <div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->

<!-- begin::Quick Nav -->
{{-- <ul class="m-nav-sticky" style="margin-top: 30px;">
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Purchase" data-placement="left">
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank"><i class="la la-cart-arrow-down"></i></a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Documentation" data-placement="left">
        <a href="https://keenthemes.com/metronic/documentation.html" target="_blank"><i class="la la-code-fork"></i></a>
    </li>
    <li class="m-nav-sticky__item" data-toggle="m-tooltip" title="Support" data-placement="left">
        <a href="https://keenthemes.com/forums/forum/support/metronic5/" target="_blank"><i class="la la-life-ring"></i></a>
    </li>
</ul> --}}

<!-- begin::Quick Nav -->

<!--begin::Global Theme Bundle -->

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors -->
{{-- <script src="{!!asset('public/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js')!!}" type="text/javascript"></script>
 --}}
<!--end::Page Vendors -->

<!--begin::Page Scripts -->
<script src="{!!asset('public/js/vendors.bundle.js') !!}" type="text/javascript"></script>
<script src="{!!asset('public/js/scripts.bundle.js') !!}" type="text/javascript"></script>
<script src="{!!asset('public/js/dashboard.js')!!}" type="text/javascript"></script>


<script src="{!!asset('public/assets/vendors/custom/datatables/datatables.bundle.js')!!}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts -->
{{-- <script src="public/assets/demo/default/custom/crud/datatables/basic/scrollable.js" type="text/javascript"></script>
 --}}

@yield('js')

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
